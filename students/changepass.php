<?php
  include("db.php");
  if($_POST['username']){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=md5($_POST['password']); 
    $sql = "UPDATE student SET username = '$username' , password = '$password' WHERE student_id = '".$id."'";
    mysql_query($sql);
  }
?>