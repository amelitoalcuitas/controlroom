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
<title> Scanner </title>
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
    <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">

 
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

        <li class="treeview">
          <a href="room.php">
            <i class="fa fa-home"></i>
            <span>Rooms</span>
          </a>
        </li>

         <li class="active treeview">
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
       Scanner
      </h1>


      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Scan</li>
      </ol>


        <section class="content">
      <div class="row">
      
          <div class="col-md-6 col-md-offset-0">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Scan Qr Code</h3>
            </div>
            <div class="box-body">

          
          <div id="container">
          <div class="row">
          <div class="col-md-12">
          <div id="container">
      
        <div style='display:none;'>
          <div class="select">
            <label for="audioSource">Audio input source: </label><select id="audioSource"></select>
          </div>

          <div class="select">
            <label for="audioOutput">Audio output destination: </label><select id="audioOutput"></select>
          </div>
        </div>
        
        <div class="select">
          <label for="videoSource">Video source: </label><select id="videoSource" class='form-control'></select>
        </div>
        
      </div>
  </div>
  </div>

  <div id='wrap'>
    <div >
      <video width="350" height="400" id="video" autoplay></video>
    </div>
    <div>
    <div class = "form-group">
      <button id='snap'>Take snapshot</button>
       <button id='scan'>Scan Code</button>
    </div>
    
    </div>
  </div>
  <div style='float:left;'>
    
  </div>
 
  <div>
    <center><h1 id='results'></h1></center>
  </div><canvas id="qr-canvas"></canvas>
</div>
             

           
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
         </section>
          <!-- /.box -->


    </section>
    <!-- Main content -->
    

</div>
</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Page specific script -->
  
  <script src="scanner/js/jquery.js"></script>
  <script src="scanner/build/qcode-decoder.min.js"></script>
  <script src="scanner/js/adapter.js"></script>
  <script src="scanner/js/common.js"></script>
  <script src="scanner/js/main.js"></script>
  <script src="scanner/js/canvas.js"></script>
  <script src="scanner/js/ga.js"></script>
  
  <script type="scanner/text/javascript" src="src/grid.js"></script>
  <script type="scanner/text/javascript" src="src/version.js"></script>
  <script type="scanner/text/javascript" src="src/detector.js"></script>
  <script type="scanner/text/javascript" src="src/formatinf.js"></script>
  <script type="scanner/text/javascript" src="src/errorlevel.js"></script>
  <script type="scanner/text/javascript" src="src/bitmat.js"></script>
  <script type="scanner/text/javascript" src="src/datablock.js"></script>
  <script type="scanner/text/javascript" src="src/bmparser.js"></script>
  <script type="scanner/text/javascript" src="src/datamask.js"></script>
  <script type="scanner/text/javascript" src="src/rsdecoder.js"></script>
  <script type="scanner/text/javascript" src="src/gf256poly.js"></script>
  <script type="scanner/text/javascript" src="src/gf256.js"></script>
  <script type="scanner/text/javascript" src="src/decoder.js"></script>
  <script type="scanner/text/javascript" src="src/qrcode.js"></script>
  <script type="scanner/text/javascript" src="src/findpat.js"></script>
  <script type="scanner/text/javascript" src="src/alignpat.js"></script>
  <script type="scanner/text/javascript" src="src/databr.js"></script>


</body>
</html>
