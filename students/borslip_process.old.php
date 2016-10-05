<?php require 'connection.php'; ?>
<?php

        if(isset($_POST['reserve']))

            {
		$reservecode = rand();   
            		
                    $studId = $_POST['studId'];
                  	
                    $equip = $_POST['database'];

                    $datebor = $_POST['datebor'];
                  	$bortime = $_POST['bortime'];
                  	$rettime = $_POST['rettime'];
                  	$retdate = $_POST['retdate'];

                    $datetimebor = $datebor." ".$bortime;
                    $retdateret = $retdate." ".$rettime;

                   $counter = count($equip);
                    

                   foreach($equip as $equips)
                  {
                          $sql1 = $dbCon->query("INSERT INTO equipment_reserved (equip_id,reservation_code,stud_id, date_borrowed, expected_date_return,status) values ('{$equips}','{$reservecode}','{$studId}', '{$datetimebor}','{$retdateret}','unapproved')");

                  }
                  // 	for ($x=0;$x<$counter;$x++)
                  // 	{     
                        
                     
                  // 			$sql1 = $dbCon->query("INSERT INTO equipment_reserved (reservation_id,equip_id ,stud_id, date_borrowed, expected_date_return,status) values ('{$reserveID}','{$equip[$x]}','{$studId}', '{$datetimebor}','{$retdateret}','unapproved')");

      	               
                	 // }


				  echo '<script language="javascript">';
				 echo 'alert("success")';
			   header("Refresh: 0; url= borslip.php");
				echo '</script>';


			}
?>
