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
   <center>Les scouts de Vilejuif</center>
  </h1>
  Cette partie est reservée au membres de la maitrise<br>
  Un mot de passe est necessaire:<br>
  <?php $id=$_GET['id'];
        if ($_GET['id']==NULL)
		 {$id=$_POST['id'];}?>
  <form method="POST" action="chef.php">
   <input type="text" name="passe"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   <input type="hidden" value="<?php echo $id;?>" name="id"/>
   <input type="submit" value="entrer"/>
  </form>
  <?php echo $id;echo $_GET['action'];?>
  <a href="planning.php"> planning</a>
    </body>
 </html>
  
 <?php } ;?>


<?php if ($_POST['action']=="modifier")
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
   <center>Les scouts de Vilejuif</center>
  </h1>
  <form method="POST" action="chef.php">
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
   <?php echo $_POST['id'];?>
   </form>
   <?php if($_POST['date']!=NULL )
   {
   echo $date=$_POST['date'];
   echo $heure=$_POST['heure'];
   echo $lieu=$_POST['lieu'];
   echo $id=$_POST['id'];
   echo $id;

   
   mysql_connect("sql.e3b.org", "scoutvillejuif","flo234")  or die(mysql_error());
   mysql_select_db("scoutvillejuif_scout")  or die(mysql_error());
   mysql_query("UPDATE planning SET date='$date' WHERE id='$id'")or die(mysql_error());
   mysql_query("UPDATE planning SET lieu='$lieu' WHERE id='$id'")or die(mysql_error());
   mysql_query("UPDATE planning SET heure='$heure' WHERE id='$id'")or die(mysql_error());
   mysql_close();
   };?>
   <a href="planning.php"> planning</a>
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
   <center>Les scouts de Vilejuif</center>
  </h1>
  <form method="POST" action="chef.php">
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
   <?php echo $_POST['id'];?>
   </form>
   <?php if($_POST['date']!=NULL )
   {
   echo $date=$_POST['date'];
   echo $heure=$_POST['heure'];
   echo $lieu=$_POST['lieu'];
   echo $id=$_POST['id'];
   echo $id;

   
   mysql_connect("sql.e3b.org", "scoutvillejuif","flo234")  or die(mysql_error());
   mysql_select_db("scoutvillejuif_scout")  or die(mysql_error());
   mysql_query("INSERT INTO planning VALUES('','$lieu','$date','$heure')")or die(mysql_error());

   mysql_close();
   };?>
   <a href="planning.php"> planning</a>
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
   <center>Les scouts de Vilejuif</center>
  </h1>
  <form method="POST" action="chef.php">

   <input type="submit" value="<?php echo $_POST['action'];?>"/>
   <input type="hidden" value="maitrise" name="passe"/>
   <input type="hidden" value="<?php echo $_POST['id'];?>" name="id"/>
   <input type="hidden" value="<?php echo $_POST['action'];?>" name="action"/>
   <?php echo $_POST['id'];?>
   </form>
   <?php 
   
   echo $date=$_POST['date'];
   echo $heure=$_POST['heure'];
   echo $lieu=$_POST['lieu'];
   echo $id=$_POST['id'];
   echo $id;

   
   mysql_connect("sql.e3b.org", "scoutvillejuif","flo234")  or die(mysql_error());
   mysql_select_db("scoutvillejuif_scout")  or die(mysql_error());
   mysql_query("DELETE FROM planning WHERE id=$id")or die(mysql_error());

   mysql_close();
   ;?>
   <a href="planning.php"> planning</a>
  </body>
 </html>
<?php } ;
?>