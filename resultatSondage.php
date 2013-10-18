<?php include("contour.php"); ?>

<?php

//connexion à la base
   mysql_connect("sql.free.fr", "scoutsvillejuif","scouts94")  or die(mysql_error());
   mysql_select_db("scoutsvillejuif")  or die(mysql_error());

//calcule du nombre de réponses
$nbre = mysql_fetch_array( mysql_query( "SELECT sum( nombre ) FROM typevisiteur" ));
$nbre = $nbre[0];

//calcule du nombre de chaque réponses
//type de visiteur
$lvtx = mysql_fetch_array( mysql_query("SELECT nombre FROM typevisiteur WHERE type='louveteau/jeannette' ") );
$prcentLvtx= $lvtx[0]/$nbre*100 ;

$scout = mysql_fetch_array(mysql_query("SELECT nombre FROM typevisiteur WHERE type='scout/guide' ") );
$prcentScout= $scout[0]/$nbre*100 ;

$pio = mysql_fetch_array(mysql_query("SELECT nombre FROM typevisiteur WHERE type='pionnier/caravelle' ") );
$prcentPio= $pio[0]/$nbre*100 ;

$compa = mysql_fetch_array(mysql_query("SELECT nombre FROM typevisiteur WHERE type='compa' ") );
$prcentCompa= $compa[0]/$nbre*100 ;

$parent = mysql_fetch_array( mysql_query("SELECT nombre FROM typevisiteur WHERE type='parent' "));
$prcentParent= $parent[0]/$nbre*100 ;

$chef = mysql_fetch_array( mysql_query("SELECT nombre FROM typevisiteur WHERE type='chef' "));
$prcentChef= $chef[0]/$nbre*100 ;

$autregroupe = mysql_fetch_array( mysql_query("SELECT nombre FROM typevisiteur WHERE type='autregroupe' ") ) ;
$prcentAutregroupe = $autregroupe[0]/$nbre*100 ;

$autre = mysql_fetch_array(mysql_query("SELECT nombre FROM typevisiteur WHERE type='autre' ")) ;
$prcentAutre = $autre[0]/$nbre*100 ;

//frequence
$unParSemaine = mysql_fetch_array( mysql_query("SELECT nombre FROM frequence WHERE frequence='1_fois_par_semaine' ") );
$unParSemaine = $unParSemaine[0]/$nbre*100 ;

$unParMois = mysql_fetch_array( mysql_query("SELECT nombre FROM frequence WHERE frequence='1_fois_par_mois' ") );
$unParMois = $unParMois[0]/$nbre*100 ;

$rarement = mysql_fetch_array( mysql_query("SELECT nombre FROM frequence WHERE frequence='rarement' ") );
$rarement = $rarement[0]/$nbre*100 ;

//objet
$photos = mysql_fetch_array( mysql_query("SELECT nombre FROM objet WHERE objet='photos' ") );
$photos = $photos[0]/$nbre*100 ;

$plannings = mysql_fetch_array( mysql_query("SELECT nombre FROM objet WHERE objet='plannings' ") );
$plannings = $plannings[0]/$nbre*100 ;

$documents = mysql_fetch_array( mysql_query("SELECT nombre FROM objet WHERE objet='documents' ") );
$documents = $documents[0]/$nbre*100 ;

$nouvelles = mysql_fetch_array( mysql_query("SELECT nombre FROM objet WHERE objet='nouvelles' ") );
$nouvelles = $nouvelles[0]/$nbre*100 ;

$autre = mysql_fetch_array( mysql_query("SELECT nombre FROM objet WHERE objet='autre' ") );
$autre = $autre[0]/$nbre*100 ;

//livre d'or
$oui = mysql_fetch_array( mysql_query("SELECT nombre FROM livredor WHERE reponse='oui' ") );
$oui = $oui[0]/$nbre*100 ;

$non = mysql_fetch_array( mysql_query("SELECT nombre FROM livredor WHERE reponse='non' ") );
$non = $non[0]/$nbre*100 ;
?>

<html>
<body><div class="corps">

<?php echo $nbre ; ?> questionnaires ont été rempli<br/>
<br/>
pourcentage de louveteaux/jeannettes : <?php echo round("$prcentLvtx", 1) ;?> % <br/>
pourcentage de scouts/guides : <?php echo round("$prcentScout", 1) ;?> % <br/>
pourcentage de pionniers/caravelles : <?php echo round("$prcentPio", 1) ;?> % <br/>
pourcentage de compagnons : <?php echo round("$prcentCompa", 1) ;?> % <br/>
pourcentage de parents de scout: <?php echo round("$prcentParent", 1) ;?> % <br/>
pourcentage de Chefs/cheftaines/responsables : <?php echo round("$prcentChef", 1) ;?> % <br/>
pourcentage de visiteur d'un autre groupe : <?php echo round("$prcentAutregroupe", 1) ;?> % <br/>
autre : <?php echo round("$prcentAutre", 1) ;?> % <br/>
<br/>
<?php echo round("$unParSemaine",1) ; ?> % des visiteurs viennent une fois par semaines ou plus<br/>
<?php echo round("$unParMois",1) ; ?> % des visiteurs viennent une fois par mois<br/>
<?php echo round("$rarement",1) ; ?> % des visiteurs viennent plus rarement<br/>
<br/>
<?php echo round("$plannings",1) ; ?> % des visiteurs viennent pour les plannings<br/>
<?php echo round("$photos",1) ; ?> % des visiteurs viennent pour les photos<br/>
<?php echo round("$documents",1) ; ?> % des visiteurs viennent pour les documents<br/>
<?php echo round("$nouvelles",1) ; ?> % des visiteurs viennent pour les nouvelles<br/>
<?php echo round("$autre",1) ; ?> % des visiteurs viennent pour autre chose<br/>
<br/>
<?php echo round("$oui",1) ; ?> % des visiteurs sont pour l'idée d'un livre d'or<br/>
<?php echo round("$non",1) ; ?> % des visiteurs sont contre l'idée d'un livre d'or<br/>

</div>

<?php
mysql_close();
?>

<?php include("pied_de_page.php"); ?>