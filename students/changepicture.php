<?php require 'connection.php'; ?>
<?php
	if(isset($_POST['changepicture']))
	    {
        session_start();

if(isset($_SESSION["user"]))
{
$userid = $_SESSION["studid"];
          $upload_image=$_FILES["profile_img"]["name"]; 
          $photo="user_images/";

          /*<IMAGE UPLOAD PROCESS - START>*/
          move_uploaded_file($_FILES["profile_img"]["tmp_name"], "$photo".$_FILES["profile_img"]["name"]); 

          $insert_path="UPDATE student SET img_name = '$upload_image' ,img_path='$photo' WHERE student_id = $userid";
          $dbCon->query($insert_path);
          /*<IMAGE UPLOAD PROCESS - END>*/
 	echo '<script language="javascript">';

        header("Refresh: 0; url= profile.php");

	echo '</script>';
}
}
?>