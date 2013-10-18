<?php
session_start(); // On démarre la session AVANT toute chose

// On s'amuse à créer quelques variables de session :
$_SESSION['planning'] = 'planningf';

// Maintenant que le session_start est fait, on peut taper du code HTML
?>


<?php include("contour.php"); ?>
<html>
<head>
<title>Scouts de Villejuif Planning</title>
</head>
<body>

<div class="corpsbis">
<h1>
<center><font color="lime">Planning Farfadet</font></center>
</h1>
<table border="1">
	<tr>
		<th>Dates</th>
		<th>Lieu</th>
		<th>Horaires</th>
		<th>Commentaires</th>
	</tr>

	<?php

	if (isset($_GET['isChef']))
	$isChef=true;
	else
	$isChef=false;

	require_once("fonctions/fonctions.php");
	require_once("requetes/requetePlanning.php");

	supprimerReunionObsolete(planningfarfadet);

	$table=afficherPlanning("planningfarfadet");

	while ($donnees = mysql_fetch_array($table))
	{
			
		echo "<tr>";

		if($donnees['dateDebut'] == $donnees['dateFin'])
		echo "<td>".f_date($donnees['dateDebut'])."</td>";
		else
		echo "<td>"."du ".f_date($donnees['dateDebut'])." au ".f_date($donnees['dateFin'])." </td>";

		echo
				"<td> ".$donnees['lieu']."</td>
				<td>"."de ".recupHeure($donnees['heureDebut']).'h'.recupMinute($donnees['heureDebut'])." à ".recupHeure($donnees['heureFin']).'h'.recupMinute($donnees['heureFin'])."</td>
				<td>".$donnees['commentaire']."</td>";
			
		if ($isChef)
		{
			$id=$donnees['id'];
			?>
	<td><a href="modiff.php?id=<?php echo "$id"; ?>">modifier </a><a
		href="supprimerReunion.php?id=<?php echo "$id"; ?>&amp;quelPlanning=planningfarfadet">
	supprimer</a></td>
	<?php
		}
		echo "</tr>";
	}
	?>
</table>
<br />

	<?php
	if ($isChef)
	echo "<a href='modiff.php'>ajouter</a>";
	else
	echo "<a href='partieProtege.php'>modifier</a>";
	?> <br />
<br />

<a href="planningpdf/planning_frfdt.pdf"><img src="img_pdf.png"
	alt="pdf" border="0" /> planning farfadets au format pdf</a> <br />
<a href="pEnvoiFichier.php">modifier</a></div>

</body>
</html>
	<?php include("pied_de_page.php"); ?>