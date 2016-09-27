<?php
  include("db.php");
  if($_POST['assest_id']){
    $id=mysql_escape_String($_POST['assest_id']);
    $sql = "UPDATE equipment SET availability = 'false' WHERE assest_id='$id'";
    mysql_query($sql);
  }
?>