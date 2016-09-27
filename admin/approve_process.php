<?php require 'connection.php'; ?>
<?php
    
           $resid = $_GET['resid'];

           $sql = $dbCon->query("UPDATE room_subj_stud set application = 'approved' where room_reserve_id = '".$resid."'");


echo '<script language="javascript">';

    echo 'alert("Approved!")';
       header("Refresh: 0; url= room.php");

echo '</script>';
  

?>
