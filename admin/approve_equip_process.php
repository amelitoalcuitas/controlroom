
<?php 
require 'connection.php';

if(isset($_GET['approve_id']))
{

	$conn = $dbCon;
	$approve_id = $_GET['approve_id'];

	$sql = "UPDATE equipment_reserved SET status='approved' WHERE reservation_code = '".$approve_id."'";
	$sql2 = "INSERT INTO equipment_approved(reservation_code,admin_id) VALUES ('{$approve_id}',1)";
	$conn->query($sql);
	$conn->query($sql2);

						echo '<script language="javascript">';
                        echo 'alert("Approved!")';
                        echo '</script>';
                        header("Refresh: 0; url=equipment.php");
	

}
else if(isset($_GET['deny_id']))
{
	$conn = $dbCon;
echo $deny_id = $_GET['deny_id'];
	$sql = "UPDATE equipment_reserved SET status='denied' WHERE reservation_code = '".$deny_id."'";
	$conn->query($sql);

						echo '<script language="javascript">';
                        echo 'alert("Denied!")';
                        echo '</script>';
                        header("Refresh: 0; url=equipment.php");
}




 ?>