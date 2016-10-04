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

        <li class="active treeview">
          <a href="equipment.php">
             <i class="fa fa-wrench"></i> <span>Equipments</span> </a>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target="#viewpending"><i class="fa fa-arrows-alt"></i>  View Pending Request</a></li>
            <li><a href="#" data-toggle="modal" data-target="#viewapproved"><i class="fa fa-arrows-alt"></i> View Approved</a></li>
            <li class="active"><a href="studlist.php"><i class="fa fa-circle-o"></i> Student List</a></li>
          </ul>
        </li>

        <li class="treeview">
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
        Student List
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include "student_list.php";?>
    </section>
    <!-- /.content -->

        <!-- MODAL START -->
      <div class="modal fade" id="viewpending" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Pending Requests</h4>
            </div>

            <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Reservation</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
              <?php
                  $conn = $dbCon;


                  $sqlpending = "SELECT reservation_code
                  FROM equipment_reserved
                  WHERE status = 'unapproved'
                  GROUP BY reservation_code
                  HAVING COUNT(reservation_code) >= 1";

              
                $resultpending = $conn->query($sqlpending);

                   if ($resultpending->num_rows > 0){
                   while($row = $resultpending->fetch_assoc())
                   {
                    ?>
                  <tr>  
                      <td><?php echo  $row['reservation_code']; ?>  </td>
                      <td><a type = "button" class = "btn btn-primary" href = "show_equip_res.php?rescode=<?php echo $row['reservation_code'];?>"> View  </a>  </td>


                  </tr>

               <?php }
               
              } ?>  
                         <td> No pending request  </td>
               <?php
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



    <!-- MODAL START -->
      <div class="modal fade" id="viewapproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Approved Requests</h4>
            </div>

            <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
             
              <?php
                  $conn = $dbCon;

                $id = "SELECT * FROM equipment_approved";
                 $result = $conn->query($id);
                 $result->num_rows;
                 while($idRow = $result->fetch_assoc()){

                 $idRow['reservation_code'];

                $approved = "SELECT equipment_reserved.reservation_code,
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
                WHERE equipment_reserved.status = 'approved' AND equipment_reserved.reservation_code = '".$idRow['reservation_code']."' ";

                   $approvedID = $conn->query($approved);
                    $approvedID2 = $conn->query($approved);
                   
                  if($approvedID->num_rows > 0 )
                  {
                     $row = $approvedID->fetch_assoc();
                    
                    echo '<table id="example1" class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';

                    echo '<th>Reservation</th>';
                    echo '<th>Student Name</th>';
                    echo '<th></th>';
                    echo '<th></th>';
                    echo '<th></th>';
                    echo '<th>Date Start</th>';
                    echo '<th>Date Return</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        
                     echo "<td>" .$row['reservation_code'].  "</td>";
                     echo "<td> " . $row['student_name']. "</td>";
                        

                         while($equipment = $approvedID2->fetch_assoc())
                         {
                         echo "<td>" .$equipment['equipment_name']."</td>";

                         }
                        
                      echo "<td>"  .$row['date_borrowed']. "</td>";
                      echo "<td>"  .$row['expected_date_return']. "</td>";
                   
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
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
</script>
</body>
</html>
