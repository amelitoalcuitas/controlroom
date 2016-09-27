<?php 

if(isset($_GET['id']))
	
	{
		echo $id = $_GET['id'];

		$sql = 'UPDATE student set student_status = "blocked" WHERE student_id = "'.$id.'"';
		require 'connection.php';
		$dbCon->query($sql);

		 header("location: studlist.php");
	}
else if(isset($_GET['unblockid']))
	
	{
		echo $id = $_GET['unblockid'];

		$sql = 'UPDATE student set student_status = "cleared" WHERE student_id = "'.$id.'"';
		require 'connection.php';
		$dbCon->query($sql);

		 header("location: studlist.php");
	}




 ?>