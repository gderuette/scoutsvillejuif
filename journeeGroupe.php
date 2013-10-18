<?php include("contour.php");?>


<?php if (isset($_GET['image']))
{
        $image = $_GET['image'];
        $nomimage = preg_replace('`(.+)\..*`', '$1', $image);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
        <head>
                <title>Diaporama<?php if (isset($image)) {echo ' : '.$nomimage;}?></title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <style type="text/css">
                body
                        {background-color: #C6E3FF;}
                h1, p.center
                        {text-align: center;
                        color: blue;}
                a img
                        {padding: 1px;
                        border: 1px dotted gray;}
                .liste_image
                        {width: 160px;
                        height: 160px;
                        float: left;
                        text-align: center;
                        font-size: 12px;}
                </style>
        </head>
        <body>
<?php if (isset ($image))
{
        echo ' <p class="center"><img src="photos/groupe/journeeDeGroupe/'.$image.'" alt="'.$nomimage.'" title="'.$nomimage.'" /></p>';
}
 

 

$dir = "photos/groupe/journeeDeGroupe/miniature/";
$open = opendir($dir); // On ouvre le répertoire
while ($file = readdir($open)) // Tant qu'il y a des fichiers à lire
{
        if (is_file($dir.$file)) // On vérifie que la valeur est un fichier (pour écarter les sous-dossiers)
        {
                $extension = strtolower(substr(strrchr($file,  "." ), 1)); // On prend l'extension du fichier dans la variable $extension avec une sous-chaîne
                $extsupport = array("jpg", "jpeg", "gif", "png"); // La liste des extensions possibles pour une image
                if (in_array($extension, $extsupport) and ($file[0] != "#")) // Si l'extension ne figure pas dans la liste, on passe le fichier (à noter : pour cacher une image, placez un "#" devant son nom : elle ne passera pas cette étape et ne sera pas listée)
                {
                        $files[] = $dir.$file; // Si elle y figure, on ajoute le fichier à l'array $files
                }
        }
}
closedir($open); // Et enfin on ferme le dossier


foreach($files as $image)
{
        $image = preg_replace('`photos/groupe/journeeDeGroupe/miniature/(.+)`','$1',$image);
        $nomimage = preg_replace('`(.+)\..*`', '$1', $image);
 
        echo '      <div class="liste_image"><a href="?image='.$image.'"><img src="photos/groupe/journeeDeGroupe/miniature/'.$image.'" alt="'.$nomimage.'" title="'.$nomimage.'" /></a><br />
                        </div>
';
}
?>
        </body>
</html>

