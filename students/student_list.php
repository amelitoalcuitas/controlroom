<div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
                          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Course</th>
                  <th>Year</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                
                <!--connection to database-->
                       <?php
                       require 'connection.php';
                          $conn = $dbCon;
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "SELECT * FROM student";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                             while($row = $result->fetch_assoc()) {
                                ?>
                                <tr id="row_<?php echo $row['student_id'];?>">
                                  <td style="width:110px"> 
                                    <span id="id_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_id'];?> </span>
                                  </td>
                                  <td> 
                                    <span id="name_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_name'];?> </span>
                                    <input type="text" class="inpt" id="name_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_name'];?>" style="display:none;">
                                  </td>
                                  <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_course'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                     <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_year'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                     <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_status'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                     <td> 
                                    <span id="type_<?php echo $row['assest_id'];?>" class="text"> <?php echo $row['student_email'];?> </span>
                                    <input type="text" class="inpt" id="type_input_<?php echo $row['assest_id'];?>" value="<?php echo $row['equipment_type'];?>" style="display:none;">
                                  </td>
                                  <td>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#viewblock">Block</button>
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