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
<title> Equipment List </title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<script type="text/javascript">
  var buttonid = 0;   
</script>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include "siteheader.php"; ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
             <i class="fa fa-wrench"></i> <span>Equipments</span> </a>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target="#viewpending"><i class="fa fa-arrows-alt"></i>  View Pending Request</a></li>
            <li><a href="#" data-toggle="modal" data-target="#viewapproved"><i class="fa fa-arrows-alt"></i> View Approved</a></li>
            <li><a href="studlist.php"><i class="fa fa-circle-o"></i> Student List</a></li>
          </ul>
        </li>

       <li class="treeview">
          <a href="return_eqp.php">
            <i class="fa fa-inbox"></i>
            <span>Return Equipments</span>
          </a>
        </li>

      <li class="treeview">
          <a href="room.php">
            <i class="fa fa-home"></i>
            <span>Rooms</span>
          </a>
        </li>

         <!-- <li class="treeview">
          <a href="scan.php">
            <i class="fa fa-camera"></i>
            <span>Scan</span>
          </a>
        </li> -->

         <li class="treeview">
          <a href="new_admin.php">
            <i class="fa fa-user"></i>
            <span>New Admin</span>
          </a>
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
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Equipments</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Equipment</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Equipment ID</th>
                  <th>Equipment Image</th>
                  <th>Equipment Name</th>
                  <th>Equipment Type</th>
                  <th>Availability</th>
                  <th>Date Added</th>
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

                            $sql = "SELECT * FROM equipment where availability = 'true' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                             while($row = $result->fetch_assoc()) {
                              $image_name=$row["img_name"];
                              $image_path=$row["img_path"];
                                ?>
                                <tr id="row_<?php echo $row['assest_id'];?>">
                                  <td style="width:110px"> 
                                    <span id="id_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['assest_id'];?> </span>
                                  </td>
                                  <td> 
                                    <img id="img_<?php echo $row['assest_id'];?>" src="<?php echo $image_path; ?><?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="200">
                                  </td>
                                  <td> 
                                    <span id="name_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['equipment_name'];?> </span>
                                    <input type="text" class="inpt" id="name_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_name'];?>" style="display:none;">
                                  </td>
                                  <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['equipment_type'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                  <td> 
                                    <span id="avail_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['availability'];?> </span>
                                  </td>
                                  <td> 
                                    <span id="date_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['date_acquired'];?></span>
                                    <input type="date" class="inpt" id="date_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['date_acquired'];?>" style="display:none;">
                                  </td>
                                  <td> 
                                    <input type="button" class="editbutton btn btn-primary" id="edit_<?php echo $row['assest_id'];?>" name="<?php echo $row['assest_id'];?>" value="Edit">
                                    <button style="display:none;" type="button" class="donebutton btn btn-success" id="done_<?php echo $row['assest_id'];?>" name="<?php echo $row['assest_id'];?>"> <span class="fa fa-check"> </span> </button>
                                    <button style="display:none;" type="button" class="delbutton btn btn-danger" id="del_<?php echo $row['assest_id'];?>" name="<?php echo $row['assest_id'];?>"> <span class="fa fa-trash"> </span> </button>
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
              <h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
            </div>
            <form role="form" action = "add_equip.php" method ="post" enctype="multipart/form-data">
              <div class="modal-body">
                
                <div class="form-group">
                  <label>Equipment Name</label>
                  <input type="text" class="form-control" name = "equipname">
                </div>
                <div class="form-group">
                  <label>Equipment Type</label>
                    <select class='form-control' name='equiptype'>
                      <option value='Camera'>Camera</option>
                      <option value='Speaker'>Speaker</option>
                      <option value='SDcard'>SDcard</option>
                      <option value='Tripod'>Tripod</option>
                      <option value='Slider'>Slider</option>
                      <option value='CameraBatteryCharger'>CameraBatteryCharger</option>
                      <option value='Videomic'>Videomic</option>
                      <option value='Microphone'>Microphone</option>
                      <option value='ExtensionCord'>ExtensionCord</option>
                      <option value='Amplifier'>Amplifier</option>
                    </select>
                  </select>
                </div>
                <div class="form-group">
                  <label>Availability</label>
                  <input type="radio" name="equipavail" value="true">True</input><input type="radio" name ="equipavail" value="false">False<br>
                </div>
                <div class="form-group">
                  <label>Date Added</label>
                  <input type="date" class="form-control" name="dateadded">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Equipment Picture</label>
                  <input type="file" name="eqp_img" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name = "RegisterEquip"class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    <div class="modal fade" id="myModaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
            </div>
            <form role="form" action = "add_equip.php" method ="post" >


            </form>
          </div>
        </div>
      </div>
<!--MODAL UPDATE END-->


<?php include 'modal.php'; ?>


  
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
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

  $(document).ready(function(){
    $(".editbutton").click(function(){
      var ID=$(this).attr('name');
      $("#edit_"+ID).hide();
      $("#name_"+ID).hide();
      $("#type_"+ID).hide();
      $("#date_"+ID).hide();
      $("#done_"+ID).show();
      $("#del_"+ID).show();
      $("#name_input_"+ID).show();
      $("#type_input_"+ID).show();
      $("#date_input_"+ID).show();
  });

  $(".donebutton").click(function(){
    var ID=$(this).attr('name');
    var name=$("#name_input_"+ID).val();
    var type=$("#type_input_"+ID).val();
    var avail=$("#avail_input_"+ID).val();
    var date=$("#date_input_"+ID).val();
    var dataString = 'assest_id='+ID+'&equipment_name='+ID+'&equipment_type='+type+'&availability='+avail+'&date_acquired='+date;
  
    $("#edit_"+ID).show();
    $("#name_"+ID).show();
    $("#type_"+ID).show();
    $("#date_"+ID).show();
    $("#done_"+ID).hide();
    $("#del_"+ID).hide();
    $("#name_input_"+ID).hide();
    $("#type_input_"+ID).hide();
    $("#date_input_"+ID).hide();

    if(name.length > 0){
      $.ajax({
      type: "POST",
      url: "edit.php",
      data: dataString,
      cache: false,
      success: function(html){
        $("#name_"+ID).html(name);
        $("#type_"+ID).html(type);
        $("#avail_"+ID).html(avail);
        $("#date_"+ID).html(date);
      }
      });
    }else{
      alert('Enter something.');
    }

  });

  $(".delbutton").click(function(){
    if(confirm("Are you sure you want to delete?")){
      var ID=$(this).attr('name');
      var dataString = 'assest_id='+ID;
      $.ajax({
        type: "POST",
        url: "delete.php",
        data: dataString,
        cache: false
        });
      $("#row_"+ID).remove();
    }
  });

});
</script>
</body>
</html>
