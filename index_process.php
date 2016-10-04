<?php 


if(isset($_POST['login']))
{

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$dbCon = mysqli_connect("localhost", "root", "", "controlroom");

    $sqladmin = "SELECT * from admin WHERE admin_username = '".$username."' AND admin_password = '".$password."'";
    $result = $dbCon->query($sqladmin);

    if($result->num_rows > 0 )
	    {
	    	session_start();
	    	$row = $result->fetch_assoc();
	    	$_SESSION['user'] = $row['admin_id'];
	    	$_SESSION['name'] = $row['admin_name'];
	    	 header("Location: admin/dashboard.php");
	    } 

    $sqlstudent = "SELECT * from student WHERE username = '".$username."' AND password = '".$password."' AND student_status!='blocked'";
	$result2 = $dbCon->query($sqlstudent);

   
  if($result2->num_rows > 0)
	    {
			session_start();
	    	$row2 = $result2->fetch_assoc();
	    	 $_SESSION['studid'] = $row2['student_id'];
	    	 $_SESSION['user'] = $row2['student_name'];
	    	 header("Location: students/dashboard.php");
	    }

   if($result2->num_rows == 0)
 		{
	    	echo '<script language="javascript">';
            echo 'alert("Wrong Information!")';
            echo '</script>';
            header("Refresh: 0; url=index.html");
         }

}





 ?>