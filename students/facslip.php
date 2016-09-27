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
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        <li class="treeview">
          <a href="dashboard.php">
            <i class="fa fa-camera"></i>
            <span>Equipments</span>
          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="borslip.php"><i class="fa fa-circle-o"></i> Equipment Borrower's Slip</a></li>
            <li class="active"><a href="facslip.php"><i class="fa fa-circle-o"></i> Facilities Use Slip</a></li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Forms
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-camera"></i> Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Facilities Use Slip</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <div class="col-md-6 col-md-offset-0">
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
             while($profilerow = $profileresult->fetch_assoc())
              {
                 ?>

            <form role="form" action = "facslip_process.php" method = "post">

               <!-- Student Id-->
                <div class="form-group">
                  <label>Student ID</label>
                  <input type="text" class="form-control" name = "studid" value = "<?php echo $userid; ?>" readonly>
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

<?php }
}
?>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->


        <!-- left column -->
        <div class="col-md-6 col-md-offset-0">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Facilities Slip Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- use date -->
                <?php
         error_reporting(0);
               if(isset($_GET))
       {
                $room = $_GET['roomnum'];
               
        $conn = $dbCon;


        $sql = "SELECT room_subject.room_num,
        subject.start_time, 
        subject.end_time,
        subject.days_of_use
        FROM subject
        JOIN room_subject ON room_subject.subj_id = subject.subject_id
        WHERE room_subject.room_subj_id = '".$room."'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo '<div class="form-group"><input type = "text" class="form-control" name = "room_num" value= "'.$row['room_num'].'" readonly/> </div>'; '<br>';

            echo '<div class="hidden"><input type = "text" class="form-control" name = "room_subj_id" value= "'.$room.'" readonly/> </div>'; '<br>';

            echo '<div class="form-group"> <input type = "text" class="form-control" name = "start" value= "'.$row['start_time'].'" readonly/> </div>';

            echo '<div class="form-group"> <input type = "text" class="form-control" name = "end" value= "'.$row['end_time'].'" readonly/> </div>';

             echo '<div class="form-group"> <input type = "text" class="form-control"  value= "'.$row['days_of_use'].'" readonly/> </div>';

            echo '<div class="form-group"> <input type = "date" name = "date" class="form-control" required/> </div>';


             echo '<h2> Reasons for reservation </h2>';
             echo '<input type="radio" name="r1" value="meeting" required> Meeting<br>';
             echo  '<input type="radio" name="r1" value="workshop" required> Workshop<br>';
             echo '<input type="radio" name="r1" value="other" required> Others';
        }
      }
    }
    ?>

                <button style="float:right" class="btn btn-primary" type="submit" value = "submit" name = "submit"> Submit Form </button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
          <!-- add classroom -->
<div class="col-md-6 col-md-offset-0">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Rooms </h3>
              </div>
              <div class="box-body">

              <!--end of add classroom-->

                 <!-- TABLE-->

                <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#viewModal"> Search Room </button>
              </div>
              <!-- /.box-body -->
            </div>
          </div>


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
      <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Room Schedule</h4>
            </div>

           <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="form-group">Select room:
            <select name = "selectunit" id="selectroom" class="form-control" onchange="showSched(this.value);">
            <option value=""> Select Room </option>
            <!--connection to database-->

            <?php
            $conn1 = $dbCon;
            if ($conn1->connect_error) {
            die("Connection failed: " . $conn1->connect_error);
            }

            $sql = "SELECT * from room";
            $result1 = $conn1->query($sql);

            if ($result1->num_rows > 0) {

            while($row1 = $result1->fetch_assoc()) {
            ?>
            <option value="<?php echo $row1['room_num']?>"> <?php echo $row1['room_num']; ?> </option>

            <?php
            }

            }

            ?>

            </select>
            </div>


        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Room Code</th>
                  <th>Room Type</th>
                  <th>Room Location</th>
                  <th> Schedule </th>
                  <th> Subject </th>
                  <th> Days </th>
                  <th> availability </th>
                </tr>
                </thead>
                <tbody id = "tablebody">


                </tbody>
              </table>
            <!--end of select -->


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
        </div>
      </div>
    <!-- MODAL END -->




</div>
<!-- ./wrapper -->
<script>

  function showSched(str){
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

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
