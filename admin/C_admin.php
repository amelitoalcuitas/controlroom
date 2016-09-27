<!DOCTYPE html>
<html>
 
 <?php include 'header.php'; ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Control</b>Room</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
    <form action="C_admin_process.php" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Username" name = "username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name = "password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name = "login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#" class="text-center" data-toggle="modal" data-target="#myModal">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="login-logo">
               <b>Register</b></a> <br>
              </div>
          </div>
        <div class="modal-body">
          
          <form action="register_process.php" method="post">
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="ID number" name = "ID" required>
        <span class="glyphicon glyphicon-graduation-cap form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Name" name = "name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="date" class="form-control" placeholder="Date of Birth" name = "DOB" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Course" name = "course" required>
        <span class="fa-graduation-cap form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Year" name = "year" required>
        <span class="fa-graduation-cap form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="contact number" name = "number" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="email address" name = "email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Username" name = "username" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name = "password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="row">
        <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <center>
        <div class="col-xs-4">
          <button type="submit" name = "Register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        </center>
        <!-- /.col -->
      </div>
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal End-->


</div>
<!-- /.login-box -->

</body>
</html>
