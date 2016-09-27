
<?php 

require 'connection.php';



$id = $_GET['id'];

$sql = "UPDATE equipment_reserved SET status = 'cancel' WHERE reservation_code = '".$id."'";
$dbCon->query($sql);

header("Refresh: 0; url= S_profile.php");



?>