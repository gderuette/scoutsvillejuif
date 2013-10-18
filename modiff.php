<?php

	require_once("fonctions/fonctions.php");
	require_once("requetes/requetePlanning.php");
	
	$today=date('d/m/Y');	
	$res=NULL;

	//valeurs par defaut
	$lieu = "NDA";
	$dateDebut = $today;
	$dateFin = $today;
	$heureDebut = 14;
	$heureFin = 17;
	$maj = false;
	
	
	// Dans le cas où on doit effectuer une action d'ajout ou de mise à jour			
	if( isset($_POST["action"]) ) {

		if ( isset($_POST["id"]))
		{
			$id = $_POST["id"];	
		}		
		$dateDebut=$_POST["dateDebut"];
		$dateFin=$_POST["dateFin"];
		$heureDebut=$_POST["heureDebut"].":".$_POST["minuteDebut"];
		$heureFin=$_POST["heureFin"].":".$_POST["minuteFin"];
		$lieu=$_POST["lieu"];
		$remarques=$_POST["remarques"];
		
	
		// On vérifie si les champs sont corrects
	
		if ( 
				validNonNull($dateDebut) && 
				validNonNull($dateFin) &&
				validNonNull($lieu) && 
				validTemporalite($today,$dateDebut) &&
				validTemporalite($dateDebut, $dateFin) &&
				validTemporalite2($heureDebut,$heureFin)
			)
						
	
		{
			if (isset($id))
				$res = majPlanning("planningfarfadet", $id, $dateDebut, $dateFin, $heureDebut, $heureFin, $lieu, $remarques);
			else	
				$res=creerReunion("planningfarfadet", $dateDebut, $dateFin, $heureDebut, $heureFin, $lieu, $remarques);
			
			if (res!=NULL) 
			{
				header("location: planningf.php?isChef=true");
			}
				
		}
		
		else {
		
			$heureDebut=$_POST["heureDebut"];
			$heureFin=$_POST["heureDebut"];
			$minutesDebut=$_POST["minuteDebut"];
			$minuteFin=$_POST["minuteFin"];
			$dateDebut = $_POST["dateDebut"];
			$dateFin = $_POST["dateFin"];
			$lieu = $_POST["lieu"];
			$remarques = $_POST["remarques"];
		
			$res="error";
		}
	}
	
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$reunion = mysql_fetch_array(afficherReunion('planningfarfadet', $id));
		
		$heure1=explode(":",$reunion['heureDebut']);
		$heure2=explode(":",$reunion['heureFin']);
		$h1=$heure1[0];
		$m1=$heure1[1];
		$h2=$heure2[0];
		$m2=$heure2[1];

		
		$dateDebut=convertDateBis($reunion['dateDebut']);
		$dateFin=convertDateBis($reunion['dateFin']);
		$heureDebut=$h1;
		$minuteDebut=$m1;
		$heureFin=$h2;
		$minuteFin=$m2;
		$lieu=$reunion["lieu"];
		$remarques=$reunion["commentaire"];
		
		echo "$remarques";
	}


include("contour.php");

	
?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>PLanning Scout-Guide</title>
	<meta name="description" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="fr" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link href="css/calendar.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/calendar.js"></script>
</script>

</head>

<body>

<div class="corpsbis" >
						
						<form method="POST" action="modiff.php?">
							
								<input type="hidden" id="action" name="action" />
							
							<?php
							
								if ($res=="ajout") {
									echo "<div class='message'>Ajout effectuée</div>";
								}
								else if ($res=="error") {
									echo "<div class='message'>Erreur de champs</div>";
								}
								echo "<br/>";
							?>
						
							
							
								Date du début :</br>
									<input type="text" id="dateDebut" name="dateDebut" maxlength='9' value="<?php echo "$dateDebut"; ?>" />
									<img src="images/Calendar.gif" class="Calendar" name="Calendar" height="18" onclick="return showCalendar('dateDebut', 'dd/mm/y');"/> 
							<br/><br/>		


						Date de fin :
								
									<input type="text" id="dateFin" name="dateFin" maxlength='9' value="<?php echo "$dateFin"; ?>"/>
									<img src="images/Calendar.gif" class="Calendar" name="Calendar" height="18" onclick="return showCalendar('dateFin', 'dd/mm/y');"/> 
							
							<br/><br/>								
							
								Heure du début :<br/>
								
								
									<select name="heureDebut">
										<?php 
											for ($i=0;$i<24;$i=$i+1) {
												$a=$i;
												if ($heureDebut == $a)
													echo "<option value='$a' selected>$a</option>";
												else
													echo "<option value='$a'>$a</option>";
											 }
										?>
										
									</select>
									
									h
									
									<select name="minuteDebut">
										<?php 
											for ($i=0;$i<=50;$i=$i+10) {
											$a=$i;
											if ($minuteDebut == $a)
													echo "<option value='$a' selected>$a</option>";
												else
													echo "<option value='$a'>$a</option>";
											 }
										?>
										
									</select>

							<br/><br/>
							
						Heure de fin :<br/>	
								
							<select name="heureFin">
										<?php 
											for ($i=0;$i<24;$i=$i+1) {
												$a=$i;
												if ($heureFin == $a)
													echo "<option value='$a' selected>$a</option>";
												else
													echo "<option value='$a'>$a</option>";
											 }
										?>
										
									</select>
									
									 h  
									
									<select name="minuteFin">
										<?php 
											for ($i=0;$i<=50;$i=$i+10) {
											$a=$i;
											if ($minuteFin == $a)
													echo "<option value='$a' selected>$a</option>";
												else
													echo "<option value='$a'>$a</option>";
											 }
										?>
										
									</select>

							<br/><br/>
													
							
								Lieu :<br/>
								<input type="text" maxlength='15' id="lieu" name="lieu" value="<?php echo "$lieu"; ?>"/>

							<br/><br/>
							
								Remarques :<br/>
								<TEXTAREA id="remarques" maxlength='20' name="remarques"><?php echo "$remarques"; ?></TEXTAREA>
							
							<br/><br/>
							
<?php					if(isset($_GET['id']))
							{
							?> <div align='left'><input type='submit' id='btnValider' name='btnValider' value='Modifier' /></div>
							<input type="hidden" id="id" name="id" value=<?php echo "$id"; ?>><?php
							}
						else
						{
							?><div align='left'><input type='submit' id='btnValider' name='btnValider' value='Ajouter' /></div>						
							<?php
							
							}
							?>

							
								  					
						<br/>						
				</form>					
		</div>
   		

  </body>
 </html>

 <?php include("pied_de_page.php"); ?>

 