<?php
session_start(); // On démarre la session AVANT toute chose

require_once("fonctions/motDePasse.php"); 

if (isset($_POST['tentative'])) // Si la variable existe
{
    // On se crée une variable $mot_de_passe avec le mot de passe entré
    $tentative = $_POST['tentative'];
}
else // La variable n'existe pas encore
{
    $tentative = ""; // On crée une variable $mot_de_passe vide
}
 
if (motDePasse2($tentative,'!villejuif!')) // Si le mot de passe est bon
{
	header("location: photos/rentree2009/index.html");
	exit();
}
else
{

include("contour.php");?>

<div class="corpsbis">
	Cette partie est protégé par un mot de passe
	<form action="pRentree2009.php" method="post">
		<p>
			<input type="hidden" id="isChef" name="isChef" />
			<input type="password" name="tentative" /> <input type="submit" value="Valider" />
		</p>
	</form>
</div>
<?php } ?>
	
	
	
	