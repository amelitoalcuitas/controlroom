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
<title> Dashboard </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">
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
        <li class="active">
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="login-logo">
                 <b>Information</b> <br>
                </div>
            </div>
          <div class="modal-body">
              <label>Name:</label><input class="form-control" id="modaltitle" disabled /><br>
              <label>Room Number:</label><input class="form-control" id="modalroomnum" disabled /><br>
              <label>Time Start:</label><input class="form-control" id="modaltimestart" disabled /><br>
              <label>Time End:</label><input class="form-control" id="modaltimeend" disabled />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  <!-- Modal End-->


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
<script>
$(document).ready(function() {

  var zone = "05:30";  //Change this to your timezone

$.ajax({
  url: 'process.php',
      type: 'POST', // Send post data
      data: 'type=fetch',
      async: false,
      success: function(s){
        json_events = s;
      }
});


var currentMousePos = {
    x: -1,
    y: -1
};
  jQuery(document).on("mousemove", function (event) {
      currentMousePos.x = event.pageX;
      currentMousePos.y = event.pageY;
  });

  /* initialize the external events
  -----------------------------------------------------------------*/

  $('#external-events .fc-event').each(function() {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
      title: $.trim($(this).text()), // use the element's text as the event title
      stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true,      // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    });

  });


  /* initialize the calendar
  -----------------------------------------------------------------*/

  $('#calendar').fullCalendar({
    events: JSON.parse(json_events),
    //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
    utc: true,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    droppable: false,
    // slotDuration: '00:30:00',
    eventReceive: function(event){
      var title = event.title;
      var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
      $.ajax({
          url: 'process.php',
          data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone,
          type: 'POST',
          dataType: 'json',
          success: function(response){
            event.id = response.eventid;
            $('#calendar').fullCalendar('updateEvent',event);
          },
          error: function(e){
            console.log(e.responseText);

          }
        });
      $('#calendar').fullCalendar('updateEvent',event);
      console.log(event);
    },
    eventDrop: function(event, delta, revertFunc) {
          var title = event.title;
          var start = event.start.format();
          var end = (event.end == null) ? start : event.end.format();
          $.ajax({
        url: 'process.php',
        data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
        type: 'POST',
        dataType: 'json',
        success: function(response){
          if(response.status != 'success')
          revertFunc();
        },
        error: function(e){
          revertFunc();
          alert('Error processing your request: '+e.responseText);
        }
      });
      },
     eventClick: function(event/*, jsEvent, view*/) {
       /* console.log(event.id);
            var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
            if (title){
                event.title = title;
                console.log('type=changetitle&title='+title+'&eventid='+event.id);
                $.ajax({
              url: 'process.php',
              data: 'type=changetitle&title='+title+'&eventid='+event.id,
              type: 'POST',
              dataType: 'json',
              success: function(response){
                if(response.status == 'success')
                        $('#calendar').fullCalendar('updateEvent',event);
              },
              error: function(e){
                alert('Error processing your request: '+e.responseText);
              }
            });
            } */

            $('#myModal').modal('show');
            $('#modaltitle').val(event.title);
            $('#modalroomnum').val(event.room);
            $('#modaltimestart').val(event.start);
            $('#modaltimeend').val(event.end);


 
    }, 
    eventResize: function(event, delta, revertFunc) {
      console.log(event);
      var title = event.title;
      var end = event.end.format();
      var start = event.start.format();



          $.ajax({
        url: 'process.php',
        data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
        type: 'POST',
        dataType: 'json',
        success: function(response){
          if(response.status != 'success')
          revertFunc();
        },
        error: function(e){
          revertFunc();
          alert('Error processing your request: '+e.responseText);
        }
      });
      },
    eventDragStop: function (event, jsEvent, ui, view) {
        if (isElemOverDiv()) {
          var con = confirm('Are you sure to delete this event permanently?');
          if(con == true) {
          $.ajax({
              url: 'process.php',
              data: 'type=remove&eventid='+event.id,
              type: 'POST',
              dataType: 'json',
              success: function(response){
                console.log(response);
                if(response.status == 'success'){
                  $('#calendar').fullCalendar('removeEvents');
                      getFreshEvents();
                    }
              },
              error: function(e){
                alert('Error processing your request: '+e.responseText);
              }
            });
        }
      }
    }
  });

function getFreshEvents(){
  $.ajax({
    url: 'process.php',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
          freshevents = s;
        }
  });
  $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
}


function isElemOverDiv() {
      var trashEl = jQuery('#trash');

      var ofs = trashEl.offset();

      var x1 = ofs.left;
      var x2 = ofs.left + trashEl.outerWidth(true);
      var y1 = ofs.top;
      var y2 = ofs.top + trashEl.outerHeight(true);

      if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
          currentMousePos.y >= y1 && currentMousePos.y <= y2) {
          return true;
      }
      return false;
  }

});
</script>
</body>
</html>
