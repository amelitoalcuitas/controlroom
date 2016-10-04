<!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ST</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Student</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <span class="hidden-xs"><?php echo $userin; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

              <?php

            $profile = "SELECT * FROM student WHERE student_id = '".$userid."' ";
            $profileresult = $dbCon->query($profile);
           

            if($profileresult->num_rows > 0)
            {
             while($profilerow = $profileresult->fetch_assoc()) {
                  $image_name=$profilerow["img_name"];
                  $image_path=$profilerow["img_path"];
                 ?>

                <img src="<?php echo $image_path; ?><?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" class="img-circle">
               
               <?php
                  }
                }
            ?>
                <p>
                  <?php echo $userin; ?>
                   <br> Student
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="S_logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>