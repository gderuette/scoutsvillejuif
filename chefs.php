<?php include("contour.php"); ?>
<?php if ($_POST['passe']==NULL OR $_POST['passe']!="maitrise")
 {?>
 <html>
 <head>
  <title>
   Scouts de Vilejuif
   Partie chefs
  </title>
 </head>
 <body>
  <h1>
   <center><font color="blue">Planning Scouts/Guides</font></center>
  </h1>
  Cette partie est reservée au membres de la maitrise<br>
  Un mot de passe est necessaire:<br>
  <?php $id=$_GET['id'];
        if ($_GET['id']==NULL)
		 {$id=$_POST['id'];}?>
  <form method="POST" action="chefs.php">
   <input type="text" name="passe"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   <input type="hidden" value="<?php echo $id;?>" name="id"/>
   <input type="submit" value="entrer"/>
  </form>
  <?php echo $_GET['action'];?>
  <a href="plannings.php"> planning</a>
    </body>
 </html>
  
 <?php } ;?>

<?php if ($_POST['passe']=="maitrise")
{
if ($_POST['action']=="modifier")
{echo $_POST['action'];?>
<html>
 <head>
  <title>
   Scouts de Vilejuif
   Partie chefs
  </title>
 </head>
 <body>
  <h1>
   <center><font color="blue">Planning Scouts/Guides</font></center>
  </h1>
  <form method="POST" action="plannings.php">
   date :<input type="text" name="date" /> 
   <br>
   lieu:<input type="text" name="lieu"/> 
   <br>
   heure
   <input type="text" name="heure"/>
   <input type="submit" value="<?php echo $_POST['action'];?>"/>
   <input type="hidden" value="maitrise" name="passe"/>
   <input type="hidden" value="<?php echo $_POST['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_POST['action'];?>" name="action"/>
   </form>
   
   <a href="plannings.php"> planning</a>
  </body>
 </html>
<?php } ;
?>

<?php if ($_POST['action']=="inserer")
{echo $_POST['action'];?>
<html>
 <head>
  <title>
   Scouts de Vilejuif
   Partie chefs
  </title>
 </head>
 <body>
  <h1>
   <center><font color="blue">Planning Scouts/Guides</font></center>
  </h1>
  <form method="POST" action="plannings.php">
   date :<input type="text" name="date"/> 
   <br>
   lieu:<input type="text" name="lieu"/> 
   <br>
   heure
   <input type="text" name="heure"/>
   <input type="submit" value="<?php echo $_POST['action'];?>"/>
   <input type="hidden" value="maitrise" name="passe"/>
   <input type="hidden" value="<?php echo $_POST['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_POST['action'];?>" name="action"/>
   </form>
   
   <a href="plannings.php"> planning</a>
  </body>
 </html>
<?php } ;
?>

<?php if ($_POST['action']=="supprimer")
{echo $_POST['action'];?>
<html>
 <head>
  <title>
   Scouts de Vilejuif
   Partie chefs
  </title>
 </head>
 <body>
  <h1>
   <center><font color="blue">Planning Scouts/Guides</font></center>
  </h1>
  <form method="POST" action="plannings.php">

   <input type="submit" value="<?php echo $_POST['action'];?>"/>
   <input type="hidden" value="maitrise" name="passe"/>
   <input type="hidden" value="<?php echo $_POST['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_POST['action'];?>" name="action"/>
   </form>
   
   <a href="plannings.php"> planning</a>
  </body>
 </html>
<?php } ;
};?>
 <?php include("pied_de_page.php"); ?>