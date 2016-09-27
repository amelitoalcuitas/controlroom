<?php require 'connection.php' ?>

<?php  
		$room = strval($_GET['roomnum']);
        $conn = $dbCon;
        if ($conn->connect_error) {
        	die("Connection failed: " . $conn->connect_error);
      	} 


       $sql = "SELECT room.room_num, 
       room.room_type,
       room_subject.room_subj_id,
       subject.availability,
       subject.subject_id,
       subject.start_time,
       subject.subject_name,
       subject.end_time,
       subject.days_of_use
       FROM room
       JOIN room_subject ON room_subject.room_num = room.room_num
       JOIN subject ON room_subject.room_subj_id = subject.subject_id
       WHERE room_subject.room_num = '$room' AND subject.availability = 'avail'
       ORDER BY room.room_num";
      
      	$result = $conn->query($sql);
  
    

      	if ($result->num_rows > 0){
		    while($row = $result->fetch_assoc()) {
?>
            <tr>
            <td><?php echo $row['room_num'] ?></td>
            <td><?php echo $row['room_type']?> </td>
            <td><?php echo $row['subject_name'] ?></td>
           <td><?php echo $row['start_time'] ?></td>
            <td><?php echo $row['end_time'] ?></td>
            <td><?php echo $row['days_of_use'] ?></td>
            <td><?php echo $row['availability'] ?></td>
           <td><a href ="facslip.php?roomnum=<?php echo $row['room_subj_id']?>">use</a></td>
            
            </tr>
	<?php	   }
		}
mysqli_close($conn);

?>

