<?php
$monfichier = fopen('sauvegarde.txt', 'r+');
 
$pages_vues = fgets($monfichier); // On lit la premi�re ligne (nombre de pages vues)
$pages_vues++; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au d�but du fichier
fputs($monfichier, $pages_vues); // On �crit le nouveau nombre de pages vues
 
fclose($monfichier);
 
echo '<p>Cette page a �t� vue ' . $pages_vues . ' fois !</p>';
?>
