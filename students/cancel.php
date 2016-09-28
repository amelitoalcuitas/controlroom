
<?php 

require 'connection.php';



$id = $_GET['id'];

$sql = "UPDATE room_subj_stud SET user_cancel = 'cancel' WHERE room_reserve_id = '".$id."'";
$dbCon->query($sql);

header("Refresh: 0; url= profile.php");



?>