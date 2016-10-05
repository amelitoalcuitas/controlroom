
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
              }else {
                    echo "<td>" ."No pending request".  "</td>";
                  } ?>  
                      
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
                    echo '<table id="example1" class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';

                    echo '<th>Reservation</th>';
                    echo '<th>Student Name</th>';
                    echo '<th>equipments</th>';
                    echo '<th>Date Start</th>';
                    echo '<th>Date Return</th>';
                    echo '</tr>';
                    echo '</thead>';

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


