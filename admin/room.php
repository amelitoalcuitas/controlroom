<?php require 'connection.php' ?>
<?php
session_start();

if(isset($_SESSION["user"]))
{
$userin = $_SESSION["name"];

} else {

    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

  <script>

  function showSched(str) {
    document.getElementById("tablebody").innerHTML = "wwew";
    if (str == "") {
        document.getElementById("tablebody").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tablebody").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","showsched.php?roomnum="+str,true);
        xmlhttp.send();
    }
  }

  </script>
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
      <div class="user-panel">

      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="equipment.php">
             <i class="fa fa-wrench"></i> <span>Equipments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <!--<ul class="treeview-menu">
            <li><a href="equipment.php"><i class="fa fa-circle-o"></i>  Equipment List</a></li>
            <li><a href="#" data-toggle="modal" data-target="#viewpending"><i class="fa fa-circle-o"></i>  View Pending Request</a></li>
            <li><a href="#" data-toggle="modal" data-target="#viewapproved"><i class="fa fa-circle-o"></i> View Approved</a></li>
            <li><a href="forms/editors.html"><i class="fa fa-circle-o"></i> Student List</a></li>
          </ul>-->
        </li>

        <li class="treeview active">
          <a href="room.php">
            <i class="fa fa-home"></i>
            <span>Rooms</span>
          </a>
        </li>

         <li class="treeview">
          <a href="scan.php">
            <i class="fa fa-camera"></i>
            <span>Scan</span>
          </a>
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
        Room List
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rooms</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Room</button>
               <button class="btn btn-primary" data-toggle="modal" data-target="#viewpending">View Pending Request</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Room Code</th>
                  <th>Room Type</th>
                  <th>Room Location</th>
                  <th> Schedule </th>
                </tr>
                </thead>
                <tbody>

                <!--connection to database-->

                     <?php
                        $conn = $dbCon;
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM room";
                            $result = $conn->query($sql);


                           if ($result->num_rows > 0) {
                             while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>

                                <td> <?php echo $row['room_num'];?> </td>
                                <td> <?php echo $row['room_type'];?> </td>
                                <td> <?php echo $row['room_location'];?> </td>
                                <td> <button type="button" class="viewbutt btn btn-primary" data-toggle="modal" data-target="#viewModal" onclick="showSched(this.value)" value="<?php echo $row['room_num'];?>">View</button> </td>

                                </tr>


                                   <?php
                                }
                            }
                            ?>


                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- MODAL START -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Add Room</h4>
            </div>
            <form role="form" action = "add_equip.php" method ="post" >
              <div class="modal-body">

                <div class="form-group">
                  <label>Room Code</label>
                  <input type="text" class="form-control" name = "roomnum">
                </div>
                <div class="form-group">
                  <label>Room Type</label>
                  <select name="roomtype" class="form-control">
                    <option value="speech"> Speech </option>
                    <option value="greenroom"> Green Room</option>
                    <option value="lecture"> Lecture </option>
                    <option value="laboratory"> Laboratory </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Room Location</label>
                  <input type="text" class="form-control" name = "roomloc">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name = "AddRoom" class="btn btn-primary" >Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- MODAL END -->

    <!-- MODAL START -->
      <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Room Schedule</h4>
            </div>

            <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room Code</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                  <th>Day of Use</th>
                  <th> Subject </th>
                </tr>
                </thead>
                <tbody id = "tablebody" >
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      </div>
    <!-- MODAL END -->

    <!-- MODAL START -->
      <div class="modal fade" id="viewpending" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Room Schedule</h4>
            </div>

            <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Room Number</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                  <th> Reason </th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
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
                room.room_num
                from room_subj_stud
                JOIN student ON student.student_id = room_subj_stud.student_id
                JOIN room_subject ON room_subject.room_subj_id = room_subj_stud.room_subj_id
                JOIN room ON room.room_num = room_subject.room_num
                WHERE room_subj_stud.application = 'pending'";
                $resultpending = $conn->query($sqlpending);

                   if ($resultpending->num_rows > 0){
                 while($row = $resultpending->fetch_assoc()) {

                  echo "<tr>";

                  echo "<td>" . $row['student_id'] . "</td>";
                  echo "<td>" . $row['student_name'] . "</td>";
                  echo "<td>" . $row['room_num'] . "</td>";
                  echo "<td>" . $row['time_start'] . "</td>";
                  echo "<td>" . $row['time_end'] . "</td>";
                  echo "<td>" . $row['reason'] . "</td>";
                  echo "<td>" ."<a type = 'button' class = 'btn btn-primary' href = 'approve_process.php?resid=".$row['room_reserve_id']."'>" ."Approve".  "</a>" ."</td>";
                   echo "<td>" ."<a type = 'button' class = 'btn btn-primary' href = 'deny_process.php?resid=".$row['room_reserve_id']."'>" ."Deny".  "</a>" ."</td>";
                  echo "</tr>";
              }
          }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
        </div>
      </div>
      </div>
    <!-- MODAL END -->


</div>
<!-- ./wrapper -->

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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $(".viewbutt").click(function(){
    var roomval = $(this).attr('value');
  });

</script>
</body>
</html>
