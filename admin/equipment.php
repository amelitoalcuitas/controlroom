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
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
        </div>
        
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
                                    <img src="<?php echo $image_path; ?><?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="200">
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
                  <input type="file" name="eqp_img">
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
    var dataString = 'assest_id='+ID+'&equipment_name='+name+'&equipment_type='+type+'&availability='+avail+'&date_acquired='+date;
  
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
    var ID=$(this).attr('name');
    var dataString = 'assest_id='+ID;
    $.ajax({
      type: "POST",
      url: "delete.php",
      data: dataString,
      cache: false
      });
    $("#row_"+ID).remove();
  });

});
</script>
</body>
</html>
