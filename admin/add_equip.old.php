<?php require 'connection.php'; ?>
<?php
	if(isset($_POST['RegisterEquip']))
	    {
          $name = $_POST['equipname'];
          $date = $_POST['dateadded'];
          $equiptype = $_POST['equiptype'];
          $avail = $_POST['equipavail'];

        	$sql1 = $dbCon->query ("INSERT INTO equipment (equipment_name ,equipment_type, availability, date_acquired) values ('{$name}','{$equiptype}', '{$avail}','{$date}')");

 	echo '<script language="javascript">';

        header("Refresh: 0; url= equipment.php");

	echo '</script>';
  
}else if(isset($_POST['AddRoom']))
	    {
          $num = $_POST['roomnum'];
          $type = $_POST['roomtype'];
          $loc = $_POST['roomloc'];

        	$sql1 = $dbCon->query ("INSERT INTO room (room_num, room_type, room_location) values ('{$num}','{$type}', '{$loc}')");

 	echo '<script language="javascript">';

        header("Refresh: 0; url= room.php");

	echo '</script>';
  
}

?>
