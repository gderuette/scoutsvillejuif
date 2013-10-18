<?php 
	require_once("requetes/requetePlanning.php");
	supprimerReunion($_GET['quelPlanning'], $_GET['id']);
	if ($_GET['quelPlanning']==planningscout)
		header("location: plannings.php?isChef=true");
	elseif ($_GET['quelPlanning']==planninglouveteau)
		header("location: planningl.php?isChef=true");
	elseif ($_GET['quelPlanning']==planningfarfadet)
		header("location: planningf.php?isChef=true");
	else 
		header("location: planningp.php?isChef=true");
?>