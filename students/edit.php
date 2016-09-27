<?php
  include("db.php");
  if($_POST['equip1']){
    $i = 1;
    $eq1=mysql_escape_String($_POST['equip1']);
    $eq2=mysql_escape_String($_POST['equip2']);
    $eq3=mysql_escape_String($_POST['equip3']);
    $eq4=mysql_escape_String($_POST['equip4']);
    $eq5=mysql_escape_String($_POST['equip5']);
    $studi=mysql_escape_String($_POST['studId']);
    $dateb=mysql_escape_String($_POST['datebor']);
    $retd=mysql_escape_String($_POST['retdate']);
    $bort=mysql_escape_String($_POST['bortime']);
    $rett=mysql_escape_String($_POST['rettime']);
    
    
   echo $eq1;
    
    mysql_query($sql);
  }
?>