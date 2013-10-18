
<?php if ($_GET['passe']==NULL OR $_GET['passe']!="maitrise")
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
   <center><font color="green">Planning Farfadets</font></center>
  </h1>
  Cette partie est reservée au membres de la maitrise<br>
  Un mot de passe est necessaire:<br>
  <?php $id=$_GET['id'];
        if ($_GET['id']==NULL)
		 {$id=$_POST['id'];}?>
  <form method="POST" action="modiff.php">
   <input type="text" name="passe"/>
   <input type="hidden" value="<?php echo $_GET['action'];?>" name="action"/>
   <input type="hidden" value="<?php echo $id;?>" name="id"/>
   <input type="submit" value="entrer"/>
  </form>
  <?php echo $_GET['action'];?>
  <a href="planningf.php"> planning</a>
    </body>
 </html>
  
 <?php } ;?>


