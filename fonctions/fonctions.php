<?php
// Fonction qui vérifie la validité d'un numéro de téléphone. On vérifie qui contient bien 10 numero et commence par un 0.
function validTel($tel) {
	if ($tel == "" || !ereg("^0[1-68][0-9]{8}$", $tel) )
	return false;		
	else 
	return true;
}
function validNonNull($champ) {
	return (!($champ==""));
}

function validDate($date)
{
	return preg_match("#^[0-9]{1,2}/[0-9]{2}/20[0-9]{1,2}$#",$date);
}


/**
	* Fonction convertDate
	* @param dateA de format JJ/DD/AAAA
	* @return une date de format AAAA-DD-JJ
	*/
function convertDate($dateA)
{
	$date = explode ( "/", $dateA );
	$jour = $date[0];
	$mois = $date[1];
	$annee = $date[2];
	return ($date[2].'-'.$date[1].'-'.$date[0]);
}

function recupHeure($heure)
{
	$h = explode(":", $heure);
	return $h[0];
}

function recupMinute($heure)
{
	$m = explode(':', $heure);
	return $m[1];
}

/**
	* Fonction convertDate
	* @param dateA de format JJ/DD/AAAA
	* @return une date de format AAAA-DD-JJ
	*/
function convertDateBis($dateA)
{
	$date = explode ( "-", $dateA );
	$jour = $date[0];
	$mois = $date[1];
	$annee = $date[2];
	return ($date[2].'/'.$date[1].'/'.$date[0]);
}

function validTemporalite($date1,$date2)
{
	$date1=explode("/",$date1);
	$date2=explode("/",$date2);
	$j1=$date1[0];
	$m1=$date1[1];
	$a1=$date1[2];
	$j2=$date2[0];
	$m2=$date2[1];
	$a2=$date2[2];
	$date1=mktime(0,0,0,$m1,$j1,$a1);
	$date2=mktime(0,0,0,$m2,$j2,$a2);
	return( $date1 <= $date2 );
}

function validTemporalite2($date1,$date2)
{
	$date1=explode(":",$date1);
	$date2=explode(":",$date2);
	$h1=$date1[0];
	$m1=$date1[1];
	$h2=$date2[0];
	$m2=$date2[1];
	$date1=mktime(0,$h1,$m1,0,0,0);
	$date2=mktime(0,$h2,$m2,0,0,0);
	return( $date1 <= $date2 );
}

function validInt($int,$n)
{
	//return (0<=$int && $int<=$n);
	return preg_match("#^[1-9][0-9]{0,3}$#",$int);
}

function f_date($sqldate)
{
	// TEMPS
	// $temps = time();
	$temps=strtotime($sqldate);
	// JOURS
	$jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$jours_numero = date('w', $temps);
	$jours_complet = $jours[$jours_numero];
	// Numero du jour
	$NumeroDuJour = date('d', $temps);

	// MOIS
	$mois = array(' ', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai',
	'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	$mois_numero = date("n", $temps);
	$mois_complet = $mois[$mois_numero];

	$an = date('Y', $temps);


	$fr_temps="$jours_complet $NumeroDuJour $mois_complet $an";

	return "$fr_temps";
}

?>