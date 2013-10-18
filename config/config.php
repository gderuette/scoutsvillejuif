<?php
	//local host

/*	$host = "localhost";
	$user = "root";
	$bdd = "planningsscouts";
	$passwd = "";
	
	$message = "Une erreur est survenue lors de la connexion au serveur. Veuillez recommencez ultérieurement.";
		
	mysql_connect($host, $user, $passwd)
		or die($message);
	mysql_select_db($bdd) or die($message);*/
	
	//free
	
	$host = "gautier.deruette.sql.free.fr";
	$user = "gautier_deruette";
	$bdd = "gautier_deruette";
	$passwd = "scouts94";
	
	$message = "Une erreur est survenue lors de la connexion au serveur. Veuillez recommencez ultérieurement.";
		
	mysql_connect($host, $user, $passwd)
		or die($message);
	mysql_select_db($bdd) or die($message);
?>