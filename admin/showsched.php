<?php require 'connection.php' ?>

<?php  
		$room = strval($_GET['roomnum']);
        $conn = $dbCon;
        if ($conn->connect_error) {
        	die("Connection failed: " . $conn->connect_error);
      	} 

      	$sql = "SELECT a.room_num, b.start_time, b.end_time, b.days_of_use, b.subject_name
          FROM room_subject AS a
          JOIN subject AS b ON a.room_subj_id = b.subject_id
          WHERE a.room_num = '".$room."' ";
      	$result = $conn->query($sql);

      	if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row['room_num'] . "</td>";
            echo "<td>" . $row['start_time'] . "</td>";
            echo "<td>" . $row['end_time'] . "</td>";
            echo "<td>" . $row['days_of_use'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "</tr>";
		    }
		}
mysqli_close($conn);

?>