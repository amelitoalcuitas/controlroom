<?php
include('config.php');

$type = $_POST['type'];

if($type == 'new')
{
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'resetdate')
{
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'remove')
{
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'showinfo')
{

	include("db.php");
	
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$events = array();
	
  if($_POST['assest_id']){
    $id=mysql_escape_String($_POST['assest_id']);
    $name=mysql_escape_String($_POST['equipment_name']);
    $type=mysql_escape_String($_POST['equipment_type']);
    $avail=mysql_escape_String($_POST['availability']);
    $date=mysql_escape_String($_POST['date_acquired']);
    $sql = "UPDATE equipment SET equipment_name='$name', equipment_type='$type', date_acquired = '$date'   WHERE assest_id='$id'";
    mysql_query($sql);
  }
}

if($type == 'fetch')
{
	$events = array();
	$query = mysqli_query($con, "SELECT room_subj_stud.room_subj_id, 
                room_subj_stud.room_reserve_id,
                room_subj_stud.student_id,
                room_subj_stud.time_start,
                room_subj_stud.time_end,
                room_subj_stud.reason,
                student.student_id,
                student.student_name,
                room.room_num
                from room_subj_stud
                JOIN student ON student.student_id = room_subj_stud.student_id
                JOIN room_subject ON room_subject.room_subj_id = room_subj_stud.room_subj_id
                JOIN room ON room.room_num = room_subject.room_num
                WHERE room_subj_stud.application = 'approved'");

	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$e = array();
    //$e['id'] = $fetch['id'];
    $e['title'] = $fetch['student_name'];
    $e['room'] = $fetch['room_num'];
    $e['start'] = $fetch['time_start'];
    $e['end'] = $fetch['time_end'];

    //$allday = ($fetch['allDay'] == "true") ? true : false;
    //$e['allDay'] = $allday;

    array_push($events, $e);
	}
	echo json_encode($events);
}


?>