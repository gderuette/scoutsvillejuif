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
        echo ' <p class="center"><img src="photos/galet dor/'.$image.'" alt="'.$nomimage.'" title="'.$nomimage.'" /></p>';
}
 

 

$dir = "photos/galet dor/miniature/";
$open = opendir($dir);
while ($file = readdir($open))
{
        if (is_file($dir.$file))
        {
                $extension = strtolower(substr(strrchr($file,  "." ), 1));
                $extsupport = array("jpg", "jpeg", "gif", "png");
                if (in_array($extension, $extsupport) and ($file[0] != "#")) 
                {
                        $files[] = $dir.$file;
                }
        }
}
closedir($open);


foreach($files as $image)
{
        $image = preg_replace('`photos/galet dor/miniature/(.+)`','$1',$image);
        $nomimage = preg_replace('`(.+)\..*`', '$1', $image);
 
        echo '      <div class="liste_image"><a href="?image='.$image.'"><img src="photos/galet dor/miniature/'.$image.'" alt="'.$nomimage.'" title="'.$nomimage.'" /></a><br />
                        </div>
';
}
?>
        </body>
</html>

