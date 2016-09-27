<?php
  include("db.php");
  if($_POST['username']){
    $id =mysql_escape_string($_POST['id']);
    $username=mysql_escape_String($_POST['username']);
    $password=mysql_escape_String($_POST['password']);
    $sql = "UPDATE student SET username ='$username', password = '$password' WHERE student_id = 10306506 ";
    mysql_query($sql);
  }
?>