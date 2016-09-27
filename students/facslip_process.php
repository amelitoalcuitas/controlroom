<?php require 'connection.php'; ?>
<?php
        if(isset($_POST['submit']))
            {

                     $studid = $_POST['studid'];
                     $room_subj_stud_id = $_POST['room_subj_id'];
                     $start = $_POST['start'];
                     $end = $_POST['end'];
                     $reason = $_POST['r1'];
                     $start.$end;
                     $date = $_POST['date'];

                     
                     $startTimeDate = $date.' '.$start;
                     $endTimeDate = $date.' '.$end;

                $sql1 = $dbCon->query ("INSERT INTO room_subj_stud (room_subj_id,student_id , time_start, time_end, application , reason, user_cancel) values ('{$room_subj_stud_id}','{$studid}','{$startTimeDate}','{$endTimeDate}','pending','{$reason}','ongoing')");

                $sql = $dbCon->query("UPDATE subject set availability = 'unavail' WHERE subject_id = '".$room_subj_stud_id."' ");

                	

 echo '<script language="javascript">';

    echo 'alert("success")';
      header("Refresh: 0; url= facslip.php");

echo '</script>';
  
}

?>
