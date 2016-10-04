<?php require 'connection.php' ?>


<?php
session_start();

if(isset($_SESSION["user"]))
{
$userid = $_SESSION["studid"];
$userin = $_SESSION["user"];


} else {

    header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
  <header class="main-header">
    <?php include "siteheader.php"; ?>
  </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="dashboard.php">
                <i class="fa fa-camera"></i>
                <span>Equipments</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Forms</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="borslip.php"><i class="fa fa-circle-o"></i> Borrower's Slip</a></li>
                <li><a href="facslip.php"><i class="fa fa-circle-o"></i> Facilities Use Slip</a></li>
              </ul>
            </li>
          </ul>
        </section>
      <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            My Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-camera"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-5 col-md-offset-0">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">User Info </h3>
                </div>
                <div class="box-body">
                  <?php

            $profile = "SELECT * FROM student WHERE student_id = '".$userid."' ";
            $profileresult = $dbCon->query($profile);
           

            if($profileresult->num_rows > 0)
            {
             while($profilerow = $profileresult->fetch_assoc()) {
                  $image_name=$profilerow["img_name"];
                  $image_path=$profilerow["img_path"];
                 ?>

                  <div class="col-md-1 col-md-offset-2">
                                    <img class = "thumbnail" src="<?php echo $image_path; ?><?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="300" height="300">
                    <!--<img src = "user_images/default.jpg" class = "thumbnail" width="300" height = "300">-->
                  </div>
                  <!-- Student Id-->    
                  <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" id = "studentID" name = "studid" value = "<?php echo $userid; ?>" readonly>
                  </div>
                  <!-- Student Name -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value = "<?php echo $userin;?>" readonly>
                  </div>
                  <!-- Course & Year -->
                  <div class="form-group">
                    <label>Course & Year</label>
                    <input type="text" class="form-control" value = "<?php echo $profilerow['student_course']."-".$profilerow['student_year'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="user1" value = "<?php echo $profilerow['username'];?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" id="pass1" class="form-control" value="" readonly>
                  </div>       
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <label>
                      <button type = "button" data-toggle="modal" data-target="#myModal" class = "btn btn-primary" name = "ChangePic"> Change Picture </button>
                        <button type = "button" id = "cpass" class = "btn btn-success" name = "ChangePass"> Change Password </button>
                        <button style="display:none;" type="button" class="donebutton btn btn-success" id="donebutt"> <span class="fa fa-check"></span> </button>
                        <button style="display:none;" type="button" class="delbutton btn btn-danger" id="delbutt"> <span class="fa fa-times"></span> </button>
                      </label>
                    </div>
                  </div>
                <!-- /.box-body -->
                </div>
              </div>

 <!-- MODAL START -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Change Picture</h4>
            </div>
          <div class="modal-body">

            <div class="form-group">
              <form role="form" action = "changepicture.php" method ="post" enctype="multipart/form-data">
              <input type="file" name="profile_img" required>
            </div>

             <div class="modal-footer">
               <button type="submit" name = "changepicture" class="btn btn-primary">Upload</button>
             </div>

              </form>
          </div>
          </div>
        </div>
      </div>
    <!-- MODAL END -->

               <?php
                  }
                }
            ?>
               
            </div>
            <!--END OF USERINFO-->
            <!--table-->
            <div class="col-md-7 col-md-offset-0">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pending Request for Facility Use </h3>
                </div>
                <div class="box-body">
                  <!-- Main content -->      
                  <div class="box-header">
                  </div>
                  <!-- /.box-header -->
                  <?php
                    $conn = $dbCon;
                    $sqlpending = "SELECT room_subj_stud.room_subj_id, 
                                          room_subj_stud.room_reserve_id,
                                          room_subj_stud.student_id,
                                          room_subj_stud.time_start,
                                          room_subj_stud.time_end,
                                          room_subj_stud.reason,
                                          student.student_id,
                                          student.student_name,
                                          room.room_num,
                                          room.room_type,
                                          room.room_location
                                  from room_subj_stud
                                  JOIN student ON student.student_id = $userid
                                  JOIN room_subject ON room_subject.room_subj_id = room_subj_stud.room_subj_id
                                  JOIN room ON room.room_num = room_subject.room_num
                                  WHERE room_subj_stud.application = 'pending' 
                                  AND room_subj_stud.user_cancel = 'ongoing' ";
                    $resultpending = $conn->query($sqlpending);

                    if ($resultpending->num_rows > 0){
                      echo "<div class= 'content'>";
                      echo "<div class= 'row'>";
                      echo "<table id='example1' class='table table-bordered table-striped'>";
                      echo "<thead>";
                      echo "<tr>";
                      echo "<th>"."Room Number". "</th>";
                      echo "<th>"."Room Type". "</th>";
                      echo "<th>"."Room Location". "</th>";
                      echo "<th>"."Time Start". "</th>";
                      echo "<th>"."Time End"." </th>";
                      echo "<th>"."Purpose". "</th>";
                      echo "<th>"."". "</th>";
                      echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";  

                      while($row = $resultpending->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['room_num'] . "</td>";
                        echo "<td>" . $row['room_type'] . "</td>";
                        echo "<td>" . $row['room_location'] . "</td>";
                        echo "<td>" . $row['time_start'] . "</td>";
                        echo "<td>" . $row['time_end'] . "</td>";
                        echo "<td>" . $row['reason'] . "</td>";
                        echo "<td> <a href = 'cancel.php?id= ".$row['room_reserve_id']."'> <button type = 'button' class='btn btn-danger'>"  . "Cancel". "</button></a> </td>";
                        echo "</tr>";  
                      }
                      echo "</tbody>";
                      echo "</table>";
                      echo "</div>";
                      echo "</div>";
                    }else {
                      echo  "<table id='example1' class='table table-bordered table-striped'>";
                      echo "<thead>";
                      echo "</thead>";
                      echo "<tbody>";
                      echo "<tr>";
                      echo "<td>" ."NO PENDING REQUEST" ."</td>";
                      echo "</tr>";
                      echo "</tbody>";
                      echo  "</table>";
                    }
                  ?>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!--START OF TABLE 2-->
            <div class="col-md-7 col-md-offset-0">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pending Request for Equipment Use </h3>
                </div>
                <div class="box-body">
                  <!-- Main content -->      
                  <div class="box-header">
                  </div>
                  <!-- /.box-header -->
                  <?php
                    $conn = $dbCon;
                    $id = "SELECT * FROM equipment_reserved";
                    $result = $conn->query($id);
                    $idRow = $result->fetch_assoc();
                    $sqlpending = "SELECT equipment_reserved.reservation_code,
                                          equipment_reserved.equip_id,
                                          equipment_reserved.stud_id,
                                          equipment_reserved.reservation_id,
                                          equipment_reserved.date_borrowed,
                                          equipment_reserved.expected_date_return,
                                          student.student_name,
                                          student.student_course,
                                          student.student_year,
                                          equipment.equipment_name
                                  from equipment_reserved
                                  JOIN student ON student.student_id = equipment_reserved.stud_id
                                  JOIN equipment ON equipment.assest_id = equipment_reserved.equip_id
                                  WHERE equipment_reserved.status = 'unapproved' AND equipment_reserved.stud_id = $userid AND equipment_reserved.reservation_code = '".$idRow['reservation_code']."' ";
                    $resultpending = $conn->query($sqlpending);
                    $resultpending2 = $conn->query($sqlpending);
                    $row2 = $resultpending2->fetch_assoc();

                    if ($resultpending->num_rows > 0){
                      echo "<div class= 'content'>";
                      echo "<div class= 'row'>";
                      echo "<table id='example1' class='table table-bordered table-striped'>";
                      echo "<thead>";
                      echo "<tr>";
                      echo "<th>" ."Room Number"."</th>";
                      echo "<th>"."Room Type"."</th>";
                      echo "<th>"."Room Location"."</th>";
                      echo "<th>"."Time Start"."</th>";
                      echo "<th>"."Time End"." </th>";
                      echo "<th>"."Purpose"."</th>";
                      echo "<th>".""."</th>";
                      echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                      echo "<tr>";
                      echo "<td>" . $row2['student_name'] . "</td>";
                      echo "<td>" . $row2['date_borrowed'] . "</td>";

                      while($row = $resultpending->fetch_assoc()) {
                        echo "<td>" . $row['equipment_name'] . "</td>";
                      }

                      echo "<td>"; 
                      echo "<a href = 'equipment_cancel.php?id=".$idRow['reservation_code']."'>";
                      echo "<button type = 'button' class='btn btn-danger'>"."Cancel"."</button>";
                      echo "</a>";
                      echo "</td>";
                      echo "</tr>";
                      echo "</tbody>";
                      echo "</table>";
                      echo "</div>";
                      echo "</div>";     
                    }else {
                      echo "<table id='example1' class='table table-bordered table-striped'>";
                      echo "<thead>";
                      echo "</thead>";
                      echo "<tbody>";
                      echo "<tr>";
                      echo "<td>" ."NO PENDING REQUEST" ."</td>";
                      echo "</tr>";
                      echo "</tbody>";
                      echo "</table>";
                    }
                  ?>
                </div>
              <!-- /.box-body -->
              </div>
            </div>         
            <!--END OF TABLE2-->
            <!--table for approved-->
            <div class="col-md-7 col-md-offset-0">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Approved Request for Rooms</h3>
                </div>
                <div class="box-body">
                  <!-- Main content -->      
                  <div class="box-header">
                  </div>
                  <!-- /.box-header -->
                    <?php
                      $conn = $dbCon;
                      $sqlpending = "SELECT room_subj_stud.room_subj_id, 
                                            room_subj_stud.room_reserve_id,
                                            room_subj_stud.student_id,
                                            room_subj_stud.time_start,
                                            room_subj_stud.time_end,
                                            room_subj_stud.reason,
                                            room.room_num,
                                            room.room_type,
                                            room.room_location,
                                            student.student_id,
                                            student.student_name
                                    from room_subj_stud
                                    LEFT JOIN student ON student.student_id = $userid
                                    LEFT JOIN room_subject ON room_subject.room_subj_id = room_subj_stud.room_subj_id
                                    LEFT JOIN room ON room.room_num = room_subject.room_num
                                    WHERE room_subj_stud.application = 'approved' AND room_subj_stud.student_id =$userid";

                      $resultpending = $conn->query($sqlpending);

                      if ($resultpending->num_rows > 0){
                        echo "<div class= 'content'>";
                        echo "<div class= 'row'>";
                        echo "<table id='example1' class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>"."Room Number". "</th>";
                        echo "<th>"."Room Type". "</th>";
                        echo "<th>"."Room Location". "</th>";
                        echo "<th>"."Time Start". "</th>";
                        echo "<th>"."Time End"." </th>";
                        echo "<th>"."Purpose". "</th>";
                        echo "<th>".""."</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        while($row = $resultpending->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['room_num'] . "</td>";
                          echo "<td>" . $row['room_type'] . "</td>";
                          echo "<td>" . $row['room_location'] . "</td>";
                          echo "<td>" . $row['time_start'] . "</td>";
                          echo "<td>" . $row['time_end'] . "</td>";
                          echo "<td>" . $row['reason'] . "</td>";
                          echo "<td> <a href = 'formpdf.php?id=".$row['room_reserve_id']."' > <button type = 'button' class='btn btn-success'>"  . "Print Form". "</button> </a> </td>";
                          echo "</tr>";
                        }
                        echo "</tbody>";
                        echo  "</table>";
                        echo "</div>";
                        echo "</div>";
                      }
                    ?>
                </div>
              <!-- /.box-body -->
              </div>
            </div>        
            <!--table for approved-->
            <div class="col-md-7 col-md-offset-0">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Approved Request for Equipments</h3>
                </div>
                <div class="box-body">
                  <!-- Main content -->      
                  <!-- /.box-header -->
                    <?php
                      $conn = $dbCon;
                      $id = "SELECT * FROM equipment_approved";
                      $result = $conn->query($id);
                      

                      while($idRow = $result->fetch_assoc()){
                        $idRow['reservation_code'];
                        
                        $approved = "SELECT equipment_approved.reservation_code,
                        equipment_reserved.equip_id,
                        equipment_reserved.stud_id,
                        equipment_reserved.reservation_id,
                        equipment_reserved.date_borrowed,
                        equipment_reserved.expected_date_return,
                        student.student_name,
                        student.student_course,
                        student.student_year,
                        equipment.equipment_name
                        FROM equipment_approved
                        JOIN equipment_reserved ON equipment_reserved.reservation_code = equipment_approved.reservation_code
                        JOIN equipment ON equipment.assest_id = equipment_reserved.equip_id
                        JOIN student ON student.student_id = equipment_reserved.stud_id 
                        WHERE equipment_reserved.stud_id = $userid AND equipment_reserved.reservation_code = '".$idRow['reservation_code']."'
                        ";

                        $approvedID = $conn->query($approved);
                        $approvedID2 = $conn->query($approved);
                                           
                        if($approvedID->num_rows > 0){
                          $row = $approvedID->fetch_assoc();
                          echo "<div class= 'content'>";
                          echo "<div class= 'row'>";
                          echo '<table id="example1" class="table table-bordered table-striped">';
                          echo '<thead>';
                          echo '<tr>';
                          echo '<th>Reservation</th>';
                          echo '<th>Student Name</th>';
                          echo '<th></th>';
                          echo '<th></th>';
                          echo '<th>Date Start</th>';
                          echo '<th>Date Return</th>';
                          echo '<th></th>';
                          echo '</tr>';
                          echo '</thead>';
                          echo '<tbody>';
                          echo "<td>" .$row['reservation_code'].  "</td>";
                          echo "<td> " . $row['student_name']. "</td>";

                          while($equipment = $approvedID2->fetch_assoc()){
                          echo "<td>" .$equipment['equipment_name']."</td>";
                          }
                        
                          echo "<td>"  .$row['date_borrowed']. "</td>";
                          echo "<td>"  .$row['expected_date_return']. "</td>";
                          echo "<td> <a href = 'formpdf_equip.php?id=".$idRow['reservation_code']."' > <button type = 'button' class='btn btn-success'>"  . "Print Form". "</button> </a> </td>";
                          echo '</tbody>';
                          echo '</table>';       
                          echo "</div>";
                          echo "</div>"; 
                        }
                      }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
 




</div>
<!-- ./wrapper -->

</body>

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


<script type="text/javascript">

    $("#cpass").click(function(){
      $("#user1").attr("readonly", false);
      $("#pass1").attr("readonly", false);

      $("#delbutt").show();
      $("#donebutt").show();
      $("#cpass").hide();
    });

    $("#delbutt").click(function(){
      $("#user1").attr("readonly", true);
      $("#pass1").attr("readonly", true);

      $("#delbutt").hide();
      $("#donebutt").hide();
      $("#cpass").show();
    });

$(function(){
    $("#donebutt").click(function(){
      $("#user1").attr("readonly", true);
      $("#pass1").attr("readonly", true);

      $("#delbutt").hide();
      $("#donebutt").hide();
      $("#cpass").show();

      var uname = document.getElementById('user1').value;
      var pword = document.getElementById('pass1').value;
      var id =  document.getElementById('studentID').value;
      var dataString = 'username='+uname+'&password='+pword+'&id='+id;

      if(uname.length > 0 && pword.length > 0){
        $.ajax({
        type: "POST",
        url: "changepass.php",
        data: dataString,
        cache: false,
        success: function(html){
          $("#user1").html(user1);
          $("#pass1").html(pass1);
          alert("Information Saved!");
        }
        });
      }else{
        alert('Enter something.');
      }
    });
  });
</script>

</html>
