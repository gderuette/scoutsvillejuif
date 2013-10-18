<?php
session_start(); // On démarre la session AVANT toute chose

require_once("fonctions/motDePasse.php");

$page = $_GET['page'];

if (isset($_POST['tentative'])) // Si la variable existe
{
	// On se crée une variable $mot_de_passe avec le mot de passe entré
	$tentative = $_POST['tentative'];
}
else // La variable n'existe pas encore
{
	$tentative = ""; // On crée une variable $mot_de_passe vide
}

if (motDePasse($tentative)) // Si le mot de passe est bon
{
		header("location: envoieFichier.php?");
		exit();
}
else
{

	include("contour.php");?>

<div class="corpsbis">Seuls les chefs et responsables ont accès à cette
partie, son accès nécessite donc un mot de passe <?php echo $page?>

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
<p><input type="hidden" id="isChef" name="isChef" /> <input
	type="password" name="tentative" /> <input type="submit"
	value="Valider" /></p>
</form>
</div>
	<?php } ?>