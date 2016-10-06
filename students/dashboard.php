<?php require 'connection.php' ?>

<?php
session_start();

if(isset($_SESSION["user"]))
{
$userid = $_SESSION["studid"];
$userin = $_SESSION["user"];


} else {

    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Equipments</title>
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
        <li class="active treeview">
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
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Equipment List
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-camera"></i> Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Equipment Image</th>
                  <th>Equipment Name</th>
                  <th>Equipment Type</th>
                  <th>Availability</th>
                  <th>Equipment Serial</th>
                </tr>
                </thead>
                <tbody>
                
                 <!--SQL-->
                       <?php
                          $conn = $dbCon;

                          if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                          } 

                          $sql = "SELECT * FROM equipment where availability = 'true' ";
                          $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                             while($row = $result->fetch_assoc()) {
                                $image_name=$row["img_name"];
                                $image_path=$row["img_path"];
                        ?>
                                <tr id="row_<?php echo $row['assest_id'];?>">   
                                  <td> 
                                    <?php echo '<img src=http://localhost/controlroom/admin/photo/'.$image_name.' width="200">'; ?>
                                  </td>   
                                  <td> 
                                    <span id="name_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['equipment_name'];?> </span>
                                    <input type="text" class="inpt" id="name_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_name'];?>" style="display:none;"/>
                                  </td>
                                  <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['equipment_type'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                  <td> 
                                    <span id="avail_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['availability'];?> </span>
                                  </td>

                                   <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['equipment_serial'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
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
</script>
</body>
</html>
