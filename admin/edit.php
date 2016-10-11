<?php
  include("db.php");
  if($_POST['assest_id']){
    $id=mysql_escape_String($_POST['assest_id']);
    $name=mysql_escape_String($_POST['equipment_name']);
    $type=mysql_escape_String($_POST['equipment_type']);
    $avail=mysql_escape_String($_POST['availability']);
    $date=mysql_escape_String($_POST['date_acquired']);
    $sql = "UPDATE equipment SET equipment_name='$name', equipment_type='$type', date_acquired = '$date'  WHERE assest_id='$id'";
    
    mysql_query($sql);
  }
?>