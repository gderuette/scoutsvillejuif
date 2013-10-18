/* ------------------------------------------------------------------------
 * Module Population
 * ------------------------------------------------------------------------ */

/* Includes ============================================================ */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include "population.h"
#include "robot.h"
#include "maze.h"

/**
 * @addtogroup Module_Population
 */

 /*@{*/

 /* Structures ========================================================== */

 /**
 * @brief Définition du type population.
 * Composée de :
 *	- 1 Tableau de chemin
 * @see sPath
 */
typedef struct s_Population {
	/** Tableau de chemin */
	sPath *paths;
	/** Nombre de chemins */
	int size;
} sPopulation;

/* constants ================================================================ */

#define PROBA 0.8

/* Private functions ==================================================== */

/**
  * @brief Création d'une population
  * @post une population a été créée
  * @return une population de chemins
  * @test doit renvoyer un tableau de N chemins
*/
sPopulation population_create (int size, int pathSize) {

	int i;
	sPopulation population;

	// Création d'un tableau à N chemin
	population.paths = malloc(size*sizeof(sPath));
	population.size = size;

	// Initialisation du chemin
	for (i=0; i<size; i++) {
		population.paths[i] = path_create(pathSize);
	}

	return population;
}

/**
* @brief Mutation d'une population
* @pre une population a été générée
* @post la population a été modifiée
* @param population
* @return une population de chemins mutés (c'est à dire avec des chemins dont les directions ont été mutées)
* @test testes avec une petite population, si la probabilité p est de 1 les chemins sont entièrement mutés, si elle est de 0 la population est inchangée
*/
sPopulation population_pathMutation (sPopulation population) {
	int i;
	// Mutation chemin par chemin
	for (i=0 ; i<population.size ; i++) {
		population.paths[i] = path_mutation(population.paths[i], PROBA);
	}

	return population;
}

/**
* @brief Mise à jour des cases pointées par les chemins
* @pre une population a été générée
* @post les chemins de la population mise à jour
* @param population une population
* @param maze un labyrinthe
* @return une population avec les cases des chemins mise à jour
* @test cas normal: Population valide
*/

// fonction qui parcour le labyrinthe et rempli les cases(cells) du chemin
sPopulation population_updateCellsPaths (sPopulation population, sMaze maze) {
	int i, j, sizePath;
	sCoord coord;

	// Mise en relation des cases avec les chemins
	for (i=0 ; i<population.size ; i++) {

		// Initialisation des coordonnées par rapport à la case de départ du labyrinthe
		coord = maze_getStart(maze);
		sizePath = path_getSize(population.paths[i]);
		// Initialisation des cases
		for (j=0 ; j<sizePath ; j++) {

			population.paths[i] = path_setCell (population.paths[i], j,
												maze_getCell(maze, coord.X, coord.Y));

			switch(path_getDirection(population.paths[i], j)) {
				case NORTH: coord.Y++;
							break;
				case SOUTH: coord.Y--;
							break;
				case EAST:  coord.X++;
							break;
				case WEST:  coord.X--;
							break;
				case NB_DIRECTION:
							break;
			}
		}
	}
	return population;
}

/**
* @brief Déterminer de l'indice des chemins de la population
* @pre une population et un labyrinthe ont été générés
* @post l'indice des chemins a été modifié
* @param population une population
* @param maze un labyrinthe
* @return la population modifiée
* @test une population quelconque
*/
sPopulation population_setIndices (sPopulation population, sMaze maze) {

	int i, j, sizePath;

	for (i=0 ; i<population.size ; i++) {

		sizePath = path_getSize(population.paths[i]);

		for (j=0 ; j<sizePath ; j++) {
			if(cell_getWall(path_getCell(population.paths[i], j),
								path_getDirection(population.paths[i], j)) != 0)
				break;
		}

		population.paths[i] = path_setIndice(population.paths[i], j);
	}

	return population;
}

/**
* @brief calcule de la quantité d'or total d'un labyrinthe
* @pre un labyrinthe a été créé
* @post
* @param population
* @return un entier représentant la quantité d'or total qu'il y a sur le labyrinthe
* @test
*/
int population_allTreasure (sMaze maze) {

	int gold, lenght, height;
	sCoord coord;

	lenght = maze_getLength(maze);
	height = maze_getHeight(maze);
	// Parcour de toutes les cases du labyrinthe
	for (coord.X=0 ; coord.X<lenght ; coord.X++) {
		for (coord.Y=0 ; coord.Y<height ; coord.Y++) {
			// Cumul l'or de toutes les cases
			gold += cell_getGold(maze_getCell(maze, coord.X, coord.Y));
		}
	}
	return gold;
}

/**
* @brief calcule de la quantité d'essence total d'un labyrinthe
* @pre un labyrinthe a été créé
* @post
* @param population
* @return un entier représentant la quantité d'essence total qu'il y a sur le labyrinthe
* @test
*/
int population_allShaft (sMaze maze) {

	int oil, lenght, height;
	sCoord coord;

	lenght = maze_getLength(maze);
	height = maze_getHeight(maze);
	// Parcour de toutes les cases du labyrinthe
	for (coord.X=0 ; coord.X<lenght ; coord.X++) {
		for (coord.Y=0 ; coord.Y<height ; coord.Y++) {
			// Cumul les stations du labyrinthe
			if (cell_getType(maze_getCell(maze, coord.X, coord.Y)) == E)
				oil += 1;
		}
	}
	return oil;
}

/**
* @brief Détermination du score d'un chemin
* @pre une population et un labyrinthe ont été génerés
* @post le chemin a son parametre score qui a été modifié
* @param path
* @param maze
* @param a coefficent pour l'importance du chemin le plus court
* @param b coefficient pour l'importance de l'or
* @param c coefficient pour l'importance de l'essence
* @return une valeur positive si l'opération s'est bien déroulée, une valeur négative sinon.
* @test une population quelconque
*/
sPopulation population_generateScore (sPopulation population, sMaze maze, float a, float b, float c) {

	int i, j, gold, oil, sizePath, lenght, height;
	float score = 0.0;
	sCoord coordDeb, coordArr;

	lenght = maze_getLength(maze);
	height = maze_getHeight(maze);
	coordDeb = maze_getStart(maze);
	coordArr = maze_getArrival(maze);

	for (i=0 ; i<population.size ; i++) {
		sizePath = path_getSize(population.paths[i]);
		gold = 0;
		oil = 0;
		for (j=0 ; j<sizePath ; j++) {
			// Calcul les coordonées de la case suivante en fonction du chemin
			switch(path_getDirection(population.paths[i], j)) {
				case NORTH: coordDeb.Y++;
							break;
				case SOUTH: coordDeb.Y--;
							break;
				case EAST:  coordDeb.X++;
							break;
				case WEST:  coordDeb.X--;
							break;
				case NB_DIRECTION:
							break;
			}
			// Accumulation de l'or sur le parcour du chemin
			gold += cell_getGold(maze_getCell(maze, coordDeb.X, coordDeb.Y));
			// Accumulation de l'essence sur le parcour du chemin
			if (cell_getType(maze_getCell(maze, coordDeb.X, coordDeb.Y) ) == E)
				oil += 1;
		}
		// Calcul du score pour le chemin courant
		score = a*(sqrt(pow((abs(coordArr.X-coordDeb.X)),2)))
					+ (abs(pow(coordArr.Y-coordDeb.Y,2))/sqrt(pow(lenght,2)+pow(height,2)))
					+  b*gold/population_allTreasure(maze)
					+ c*oil/population_allShaft(maze);
		population.paths[i] = path_setScore(population.paths[i], score);
	}

	return population;
}

/**
* @brief trie
* @pre une population a été créée
* @post
* @param population
* @param n entier donnant la taille de la population
* @return la population trié par ordre de score décroissant
* @test
*/
sPopulation population_sort (sPopulation population) {
	return population;
	// Utilisation du quicksort !!!!
}

/**
* @brief Détermination des meilleurs chemins
* @pre une population et un labyrinthe ont ete generee
* @param population
* @param maze
* @param a coeffcient pour l'importance du chemin le plus court
* @param b coeffcient pour l'importance de l'or
* @param c coefficient pour l'importance de l'essence
* @return une population de fonction avec n/2 éléments
* @test une population quelconque
*/
sPopulation population_selection (sPopulation population) {
	int i;

	sPopulation bestPopulation = population_create (population.size/2,
										path_getSize(population.paths[0]));

	// Selection des meilleurs chemins
	population = population_sort(population);

	for (i=0 ; i<population.size/2 ; i++) {
		bestPopulation.paths[i] = population.paths[i];
	}

	return bestPopulation;

}

/**
* @brief Croisement des chemins
* @pre la population est passée par la fonction Population_selection elle est donc de dimension n/2
* @post les chemins de la population ont été croisés pour former une nouvelle population deux fois plus grande
* @param population
* @return une population de fonction avec n éléments
* @test
*/
sPopulation population_crossPath (sPopulation population) {
	return population;
	// Croisement de 2 chemins !
}

/* Public function ==================================================== */

sPath population_findSolution (sMaze maze, sRobot robot) {
	return NULL;
}


/*@}*/
