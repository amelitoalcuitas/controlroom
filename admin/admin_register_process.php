<?php require 'connection.php'; ?>
<?php
        if(isset($_POST['registeruser']))
            {
                      $upload_image=$_FILES["admin_img"]["name"]; 
                      $photo="admin_photo/";
                      
                      $name = $_POST['name'];
                      $username = $_POST['username'];
                      $DOB = $_POST['DOB'];
                      $position = $_POST['position'];
                      $password = md5($_POST['password']);

          $sql1 = $dbCon->query ("INSERT INTO admin (admin_name, admin_username, admin_birthdate, position, admin_password, img_name,img_path) values ('{$name}','{$username}','{$DOB}','{$position}','{$password}','{$upload_image}','{$photo}')");

           /*<IMAGE UPLOAD PROCESS - START>*/
          move_uploaded_file($_FILES["admin_img"]["tmp_name"], "$photo".$_FILES["admin_img"]["name"]); 

          $dbCon->query($sql1);
          /*<IMAGE UPLOAD PROCESS - END>*/

 echo '<script language="javascript">';

    echo 'alert("successfully added new user")';
        header("Refresh: 1; url= new_admin.php");

echo '</script>';
  
}

?>