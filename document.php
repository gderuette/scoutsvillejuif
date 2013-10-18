<?php
session_start(); // On démarre la session AVANT toute chose
 
// On s'amuse à créer quelques variables de session :
$_SESSION['planning'] = 'envoieFichier';
 
// Maintenant que le session_start est fait, on peut taper du code HTML
?>
<?php include("contour.php"); ?>

<html>
<head>
	<title>telecharger de documents</title>
</head>
<body>
	<div class="corps">
		<h2><font color="brown">Les documents suivants sont à votre dispostion, ils sont souvent utiles ...</font></h2>
		<br/>
		
			<a href="documents/FicheSanitaire.pdf" target="_blank"><img src="img_pdf.png" alt="pdf" border="0"/> Fiche sanitaire</a>: à remplir obligatoirement pour le camp<br/>
			<a href="documents/fiche d'inscription.pdf" target="_blank"><img src="img_pdf.png" alt="pdf" border="0"/> Fiche d'inscription pour le camp et autorisation parentale</a><br/>
			<a href="documents/Liste_matos_WE.pdf" target="_blank"><img src="img_pdf.png" alt="pdf" border="0" /> Liste du matériel à prévoir pour un weekend</a><br/>
			<a href="documents/Liste_matos_C.pdf" target="_blank"><img src="img_pdf.png" alt="pdf" border="0"/> Liste du matériel à prévoir pour un camp</a><br/>
			<a href="documents/PDL.pdf" target="_blank"/><img src="img_pdf.png" alt="pdf" border="0"/>Plan de développement local</a><br/>
			<a href="documents/CRRC.pdf" target="_blank" /><img src="img_pdf.png" alt="pdf" border="0"/>Compte rendu de la réunion de chefs</a><br/>
		
		<div class="souligne">plannings :</div>
			<a href="planningpdf/planning_frfdt.pdf"><img src="img_pdf.png" alt="pdf" border="0" /> Planning farfadets</a><br/>
			<a href="planningpdf/planning_lvtx.pdf"><img src="img_pdf.png" alt="pdf" border="0" /> Planning louveteaux et jeannettes</a><br/>
			<a href="planningpdf/planning_scout.pdf"><img src="img_pdf.png" alt="pdf" border="0" /> Planning scouts et guides</a><br/>
			<a href="planningpdf/planning_pio.pdf"><img src="img_pdf.png" alt="pdf" border="0" /> Planning pionniers et caravelles</a><br/>
		
    	<br/>
		    <a href="partieProtege.php">Envoyer un nouveau planning au format pdf (chefs)</a><br/>
		
	</div>
</body>
</html>

<?php include("pied_de_page.php"); ?>