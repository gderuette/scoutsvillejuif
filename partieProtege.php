<?php
session_start(); // On d�marre la session AVANT toute chose

require_once("fonctions/motDePasse.php");

$page = $_GET['page'];

if (isset($_POST['tentative'])) // Si la variable existe
{
	// On se cr�e une variable $mot_de_passe avec le mot de passe entr�
	$tentative = $_POST['tentative'];
}
else // La variable n'existe pas encore
{
	$tentative = ""; // On cr�e une variable $mot_de_passe vide
}

if (motDePasse($tentative)) // Si le mot de passe est bon
{
		header("location: ".$_SESSION['planning'].".php?isChef=true");
		exit();
}
else
{

	include("contour.php");?>

<div class="corpsbis">Seuls les chefs et responsables ont acc�s � cette
partie, son acc�s n�cessite donc un mot de passe <?php echo $page?>

<form action="partieProtege.php" method="post">
<p><input type="hidden" id="isChef" name="isChef" /> <input
	type="password" name="tentative" required/> <input type="submit"
	value="Valider" /></p>
</form>
</div>
	<?php } ?>



