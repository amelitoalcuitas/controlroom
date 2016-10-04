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
  <title>Borrower's Slip</title>
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
            <li class="active"><a href="borslip.php"><i class="fa fa-circle-o"></i> Borrower's Slip</a></li>
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
        Forms
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-camera"></i> Home</a></li>
        <li class="active">Forms</li>
        <li class="active">Borrower's Slip</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
         <form role = "form" action = "borslip_process.php" method = "POST">    
        <!-- Form Element sizes -->
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
           
               <!-- Student Id-->
                <div class="form-group">
                  <label>Student ID</label>
                 <input type="text" class="form-control" name="studId" value = "<?php echo $profilerow['student_id']; ?>" readonly>
                </div>

               <!-- Student Name -->
               
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" value = "<?php echo $userin;?>" readonly/>
                </div>

                <!-- Course & Year -->
                <div class="form-group">
                  <label>Course & Year</label>
                  <input type="text" class="form-control" value = "<?php echo $profilerow['student_course']."-".$profilerow['student_year'];?>" readonly>
                </div>
                <?php
                  }
                }
            ?>
               
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->



          <!--ADD EQUIPMENT-->
          <div class="col-md-6 row-md-offset-0 col-md-offset-0">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Equipments </h3>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> </th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody id="txtHint">
                  
                </tbody>
                </table>


                 <!-- TABLE-->
               <button type ="button" class = "btn btn-success" data-toggle = "modal" data-target = "#myModal">Add Equipment </button>
                   
              </div>
              <!-- /.box-body -->
            </div>
          </div>



          <!--ADD EQUIPMENT END-->

        <div class="col-md-6 col-md-offset-0">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Equipment Borrower's Slip Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <!-- borrow date -->
                <div class="form-group">
                  <label>Borrow Date</label>
                  <input type="date" name="datebor" class="form-control" required >
                </div>

                <!-- borrow time -->
                <div class="form-group">
                  <label>Borrow Time</label>
                  <input type="time" name="bortime" class="form-control" required>
                </div>

                <!-- Expected time return -->
                <div class="form-group">
                  <label>Expected Time of Return</label>
                  <input type="time" name="rettime" class="form-control" required>
                </div>

                <!-- Expected date return-->
                <div class="form-group">
                  <label>Expected Date of Return</label>
                  <input type="date" name="retdate" class="form-control" required>
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked required>
                      Lab
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked required>
                      Outside Lab
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked required>
                      Outside University
                    </label>
                  </div>
                </div>
                <button style="float:right" name = "reserve"  class="btn btn-primary" type="reserve"> Submit Form </button>
              
             
          </form>
              <!--form submit-->
            </div>

            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->
        </div>

</form>

        <!--/.col (right) -->
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
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>



              <!-- MODAL START -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
            </div>
            <form role="form">
              <div class="modal-body">
      <!--TABLE START-->
           <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Equipments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Equipment name </th>
                  <th>Type</th>
                  <th>Brand/Model</th>
                  <th>Quantity</th>
                  <th>Availability</th>
                  <th></th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                
 <!--connection to database-->
     <?php
        $conn = $dbCon;
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "SELECT * FROM equipment where availability = 'true' AND remarks = 'Functional' AND qty != 0";
      $result = $conn->query($sql);


                     if ($result->num_rows > 0) {

       while($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td> <?php echo $row['equipment_name'];?> </td>
          <td> <?php echo $row['equipment_type'];?> </td>
          <td> <?php echo $row['brand_model'];?></td> 
          <td> <?php echo $row['qty'];?> </td>
          <td> <?php echo $row['remarks'];?></td> 
          <td> <input type="number" class="form-control text-center" id="qty_<?php echo $row['assest_id'];?>" value = "<?php echo $row['qty']; ?>" min = "1" max = "<?php echo $row['qty'];?>" style="width:60px"></td>
          <td> 
          <button type = "button" data-dismiss="modal" class ="addbtn btn btn-success" value="<?php echo $row['assest_id'];?>" onclick="showUser(this.value,document.getElementById('qty_<?php echo $row['assest_id'];?>').value)">Add Product </button></td>
          </form>
              
          </tr>


             <?php
          }
      }   
      ?>    

                </tr>
                
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
             <!--TABLE END-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
              </div>
            </form>
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
var cnt = 0;
var clickid = "";
var equip_num = "";

  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

  function deleteThis(id){
    $("#section_"+id).remove();
  }

</script>

 <script>

function showUser(str,qty) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML += xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","test.php?q="+str+"&qty="+qty,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>
