<?php
session_start(); // On d�marre la session AVANT toute chose

require_once("fonctions/motDePasse.php"); 

if (isset($_POST['tentative'])) // Si la variable existe
{
    // On se cr�e une variable $mot_de_passe avec le mot de passe entr�
    $tentative = $_POST['tentative'];
}
else // La variable n'existe pas encore
{
    $tentative = ""; // On cr�e une variable $mot_de_passe vide
}
 
if (motDePasse2($tentative,'!villejuif!')) // Si le mot de passe est bon
{
	header("location: albums.php");
	exit();
}
else
{

include("contour.php");?>

<div class="corps"> <font color="purple"><h1>PHOTOS DE LA TRIBU</h1></font></div>

<div class="corpsbis">
	Cette partie est prot�g�e par un mot de passe
	<form action="pScout.php" method="post">
		<p>
			<input type="hidden" id="isChef" name="isChef" />
			<input type="password" name="tentative" /> <input type="submit" value="Valider" />
		</p>
	</form>
</div>
<?php } ?>
	
	
	
	