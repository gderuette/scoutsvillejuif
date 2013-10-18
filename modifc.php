<?php include("contour.php");?>
<?php if ($_GET['passe']!="maitrise")
{
    if ($_POST['passe']==NULL OR $_POST['passe']!="maitrise")
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
   <center><font color="green">Planning Scouts</font></center>
  </h1>
  Cette partie est reservée au membres de la maitrise<br>
  Un mot de passe est necessaire:<br>
  <?php $id=$_GET['id'];
        if ($_GET['id']==NULL)
		 {$id=$_POST['id'];}?>
  <form method="POST" action="modifc.php">
   <input type="password" name="passe"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   <input type="hidden" value="<?php echo $id;?>" name="id"/>
   <input type="submit" value="entrer"/>
  </form>
  <?php };};?>
  
  <?php if($_POST['passe']=="maitrise")
  {?><html>
 <head>
  <title>
   Scouts de Villejuif
   Planning
  </title>
 </head>
 <body>
  <h1>
   <center><font color="green">Planning Scouts</font></center>
  </h1>
  <table border="1">
   <tr>
    <td>date</td><td>lieu</td><td>heure</td><td>commentaire</td>
   </tr>
<?php
mysql_connect("sql.e3b.org", "scoutvillejuif","flo234")  or die(mysql_error());
mysql_select_db("scoutvillejuif_scout")  or die(mysql_error());
$reponse = mysql_query("SELECT * FROM planningc")or die(mysql_error());
while ($donnees = mysql_fetch_array($reponse) )
{ echo "<tr><td>".$donnees['date']." </td><td> ".$donnees['lieu']."</td><td>".$donnees['heure']."<td>".$donnees['commentaire']."</td></td><td><a href=modifc.php?id=".$donnees['id']."&amp;action=modifier&amp;passe=maitrise><input type='button' value='modifier'/></a>
																										<a href=modifc.php?id=".$donnees['id']."&amp;action=inserer&amp;passe=maitrise><input type='button' value='inserer'/></a>
																									    <a href=modifc.php?id=".$donnees['id']."&amp;action=supprimer&amp;passe=maitrise><input type='button' value='supprimer'/></a>";
}
mysql_close();
};?></table><p>

<?php  if ($_GET['action']=="modifier")
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
   <center><font color="green">Planning Scouts</font></center>
  </h1>
  <form method="POST" action="planningc.php">
   date :<input type="text" name="date" /> 
   <br>
   lieu:<input type="text" name="lieu"/> 
   <br>
   heure
   <input type="text" name="heure"/>
   <br>
   commentaire
   <input type="text" name="commentaire"/>
   <input type="submit" value="<?php echo $_GET['action'];?>"/>
   <input type="hidden" value="<?php echo $_GET['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   </form>
   
   <a href="modifc.php"> planning</a>
  </body>
 </html>
<?php } ;
?>

<?php if ($_GET['action']=="inserer")
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
   <center><font color="green">Planning Scouts</font></center>
  </h1>
  <form method="POST" action="planningc.php">
   date :<input type="text" name="date"/> 
   <br/>
   lieu:<input type="text" name="lieu"/> 
   <br/>
   heure
   <input type="text" name="heure"/>
   <br/>
   commentaire
   <input type="text" name="commentaire"/>
   <input type="submit" value="<?php echo $_GET['action'];?>"/>
   <input type="hidden" value="<?php echo $_GET['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   </form>
   
   <a href="modifc.php"> planning</a>
  </body>
 </html>
<?php } ;
?>

<?php if ($_GET['action']=="supprimer")
{echo $_GET['action'];?>
<html>
 <head>
  <title>
   Scouts de Vilejuif
   Partie chefs
  </title>
 </head>
 <body>
  <h1>
   <center><font color="green">Planning Scouts</font></center>
  </h1>
  <form method="POST" action="planningc.php">

   <input type="submit" value="<?php echo $_GET['action'];?>"/>
   <input type="hidden" value="maitrise" name="passe"/>
   <input type="hidden" value="<?php echo $_GET['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   </form>
   
   <a href="modifc.php"> planning</a>
  </body>
 </html>
<?php } ;
?>

 <?php include("pied_de_page.php"); ?>
