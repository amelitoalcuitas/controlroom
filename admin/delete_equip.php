
<?php
        
include_once 'connection.php';
 if(isset($_POST['delete'])){

$delete = $_POST['hidden'];
$sql1= $dbCon->query("UPDATE equipment SET availability = 'false' WHERE assest_id='$delete'");
echo "<script type='text/javascript'>alert('Delete Successfully!');</script>";
header("Refresh: 0; url= equipment.php");

}
else if(isset($_POST['update'])){

$update = $_POST['hidden'];
$name = $_POST['equipname'];
echo $name;

$sql1= $dbCon->query("UPDATE equipment SET equipment_name = '$name' WHERE assest_id='$update'");
echo "<script type='text/javascript'>alert('Updated Successfully!');</script>";
header("Refresh: 0; url= equipment.php");
}


                      

                //$sql1 = $dbCon->query ("INSERT INTO equipment (equipment_name ,equipment_type, availability, date_added) values ('{$name}','{$equiptype}', '{$avail}','{$date}')");



?>
