<?php include("contour.php"); ?>

<html>

<?php
	$typeVisiteur=$_POST['typeVisiteur'];
	$frequence=$_POST['frequence'];
	$objet=$_POST['objet'];
	$livreDOr=$_POST['livreDOr'];
	$remarques=$_POST['remarques'];

// on enregistre la remarques dans un fichier
$fichier = fopen('remarques.txt', 'a');
fputs($fichier, $remarques); // On écrit la nouvelle remarque
fclose($fichier);

 //connexion à la base
   mysql_connect("sql.free.fr", "scoutsvillejuif","scouts94")  or die(mysql_error());
   mysql_select_db("scoutsvillejuif")  or die(mysql_error());
   
//prise en compte des réponses
switch ($typeVisiteur)
{
	case "louveteau/jeannette":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='louveteau/jeannette'")or die(mysql_error());;
	break;

	case "scout/guide":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='scout/guide'")or die(mysql_error());;
	break;

	case "pionnier/caravelle":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='pionnier/caravelle'")or die(mysql_error());;
	break;

	case "compagnon":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='compa'")or die(mysql_error());

	case "chef":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='chef'")or die(mysql_error());;
	break;

	case "parent":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='parent'")or die(mysql_error());;
	break;
	
	case "autregroupe":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='autregroupe'")or die(mysql_error());;
	break;

	case "autre":
	mysql_query("UPDATE typevisiteur SET nombre=nombre+1 WHERE type='autre'")or die(mysql_error());;
	break;

	default:
	echo 'echec';
}

switch ($frequence)
{
	case "1_fois_par_semaine":
	mysql_query("UPDATE frequence SET nombre=nombre+1 WHERE frequence='1_fois_par_semaine'")or die(mysql_error());;
	break;

	case "1_fois_par_mois":
	mysql_query("UPDATE frequence SET nombre=nombre+1 WHERE frequence='1_fois_par_mois'")or die(mysql_error());;
	break;
	
	case "rarement":
	mysql_query("UPDATE frequence SET nombre=nombre+1 WHERE frequence='rarement'")or die(mysql_error());;
	break;	
}

switch ($objet)
{
	case "photos":
	mysql_query("UPDATE objet SET nombre=nombre+1 WHERE objet='photos'")or die(mysql_error());;
	break;
	
	case "plannings":
	mysql_query("UPDATE objet SET nombre=nombre+1 WHERE objet='plannings'")or die(mysql_error());;
	break;
	
	case "documents":
	mysql_query("UPDATE objet SET nombre=nombre+1 WHERE objet='documents'")or die(mysql_error());;
	break;
	
	case "nouvelles":
	mysql_query("UPDATE objet SET nombre=nombre+1 WHERE objet='nouvelles'")or die(mysql_error());;
	break;
	
	case "autre":
	mysql_query("UPDATE objet SET nombre=nombre+1 WHERE objet='autre'")or die(mysql_error());;
	break;
}

switch ($livreDOr)
{
	case "oui":
	mysql_query("UPDATE livredor SET nombre=nombre+1 WHERE reponse='oui'")or die(mysql_error());;
	break;
	
	case "non":
	mysql_query("UPDATE livredor SET nombre=nombre+1 WHERE reponse='non'")or die(mysql_error());;
	break;
}

mysql_close();

?>


votre sondage à bien été enregistré <a href="resultatSondage.php">voir les résultats</a>
merci pour vos réponses

</html>
