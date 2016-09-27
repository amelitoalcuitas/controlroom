<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "controolroom";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM equipment_reserved WHERE id = ".$_GET['user_id']."";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		echo $row["equip_id"]. "||" . $row["reservation_id"];
	} else {
		echo "NA";
	}

	mysqli_close($conn);
?>