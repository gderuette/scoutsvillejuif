<?php
/* variables à modifier */
$taillemax = 512000; // taille max d'un fichier (multiple de 1024)
$filetype = "(pdf)"; // types de fichiers acceptés, séparés par |
$nametype = "(.pdf)"; // extensions correspondantes
$rep = "planningpdf/"; // répertoire de destination
/* fin des modifications */

// fichier courant (URI absolue) : formulaire récursif
$PHP_SELF = basename($_SERVER['PHP_SELF']);

if($_POST) {
		
	header("location: document.php");
	
	$msg = array(); // message
	$fichier = $_FILES['lefichier']; // simplication du tableau $_FILES
		// nom du fichier original = nom par défaut
		$nom = $fichier['name'];

		$nom = $_POST['planning'];
		// répertoire de destination
		$destination = $rep.$nom.'.pdf';
		// test erreur (PHP 4.3)
		if($fichier['error']) {
			switch($fichier['error']) {
				// dépassement de upload_max_filesize dans php.ini
				case UPLOAD_ERR_INI_SIZE:
				  $msg[] = "Fichier trop volumineux !"; break;
				// dépassement de MAX_FILE_SIZE dans le formulaire
				case UPLOAD_ERR_FORM_SIZE:
				  $msg[] = "Fichier trop volumineux (supérieur à ".(INT)($taillemax/1024)." Mo)"; break;
				// autres erreurs
				default:
				  $msg[] = "Impossible d'uploader le fichier !";
			}
		}
		// test taille fichier
		elseif($fichier['size'] > $taillemax)
			$msg[] = "Fichier $nom trop volumineux : ".$fichier['size'];
		// test type fichier
		elseif(!eregi($filetype, $fichier['type']))
			$msg[] = "Fichier $nom de type incorrect : ".$fichier['type'];
		// test upload sur serveur (rep. temporaire)
		elseif(!@is_uploaded_file($fichier['tmp_name']))
			$msg[] = "Impossible d'uploader $nom";
		// test transfert du serveur au répertoire
		elseif(!@move_uploaded_file($fichier['tmp_name'], $destination))
			$msg[] = "Problème de transfert avec $nom";
		else
			$msg[] = "Planning $nom mis a jour";
	 //affichage confirmation
	for($i=0; $i<count($msg); $i++)
		echo "<p>$msg[$i]</p>";

	exit();
}

include("contour.php");
?>

<div class="corpsbis">
<!-- le formulaire -->
<form action="envoieFichier.php" enctype='multipart/form-data' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='$taillemax'>
<br/><br/>
<b>Page de mise à jour des plannings </b>: seuls les documents au format pdf sont acceptés
<br/><br/>
<b>Fichier</b> <input type='file' name='lefichier' required=""><br/><br/>
	<b>Quel planning déposes-tu ?</b><br/><br/>
	<input type="radio" name="planning" value="planning_frfdt" checked="checked"/> Farfadet<br/>
	<input type="radio" name="planning" value="planning_lvtx" /> Louveteau Jeannette<br/>
	<input type="radio" name="planning" value="planning_scout" /> Scout Guide<br/>
	<input type="radio" name="planning" value="planning_pio" /> Pionnier Caravelle<br/>
<br/>
<input type='submit' value='Envoyer'>
</form>
</div>

<?php include("pied_de_page.php"); ?>
