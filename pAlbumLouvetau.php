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
	header("location: albuml.php");
	exit();
}
else
{

include("contour.php");?>
<div class="corps"> <font color="orange"><h2>PHOTOS DE LA PEUPLADE</h2>


	Cette partie est protégée par un mot de passe</font>
	<form action="pageProtege.php" method="post">
		<p>
			<input type="hidden" id="isChef" name="isChef" />
			<input type="password" name="tentative" /> <input type="submit" value="Valider" /></div>
		</p>
	</form>
</div>
<?php } ?>
	
	
	
	