<?php require 'connection.php'; ?>
<?php
        if(isset($_POST['Register']))
            {

                      
                      $ID = $_POST['ID'];
                      $name = $_POST['name'];
                      $DOB = $_POST['DOB'];
                      $course = $_POST['course'];
                      $year = $_POST['year'];
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $number = $_POST['number'];
                      $email = $_POST['email'];

                      echo 'hello';

                $sql1 = $dbCon->query ("INSERT INTO student (student_id ,student_name, birthdate ,student_course, student_year, username,password,student_status ,student_no ,student_email) values ('{$ID}','{$name}', '{$DOB}','{$course}','{$year}', '{$username}','{$password}','cleared','{$number}','{$email}')");


 echo '<script language="javascript">';

    echo 'alert("successfully added new user")';
        header("Refresh: 1; url= S_login.php");

echo '</script>';
  
}

?>
