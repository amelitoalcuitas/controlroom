<?php require 'connection.php'; ?>
<?php
	if(isset($_POST['RegisterEquip']))
	    {
          $upload_image=$_FILES["eqp_img"]["name"]; 
          $photo="photo/";

          $name = $_POST['equipname'];
          $date = $_POST['dateadded'];
          $equiptype = $_POST['equiptype'];
          $avail = $_POST['equipavail'];
          

        	$sql1 = $dbCon->query ("INSERT INTO equipment (equipment_name ,equipment_type, availability) values ('{$name}','{$equiptype}', '{$avail}','{$date}')");

          /*<IMAGE UPLOAD PROCESS - START>*/
          move_uploaded_file($_FILES["eqp_img"]["tmp_name"], "$photo".$_FILES["eqp_img"]["name"]); 

          $insert_path="INSERT INTO equipment (img_name,img_path) VALUES('{$upload_image}','{$photo}')";

          $dbCon->query($insert_path);
          /*<IMAGE UPLOAD PROCESS - END>*/
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
