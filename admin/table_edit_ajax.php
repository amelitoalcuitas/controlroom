<?php
include("db.php");
if($_POST['id2'])
{
$id=mysql_escape_String($_POST['id2']);
$firstname=mysql_escape_String($_POST['firstname']);
$lastname=mysql_escape_String($_POST['lastname']);
$sql = "update fullnames set firstname='$firstname',lastname='$lastname' where id2='$id'";
mysql_query($sql);
}
?>