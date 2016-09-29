<?php require 'connection.php' ?>

<?php
	 
          
 
  	if(isset($_GET))
   {
    $q = $_GET['q'];

        $conn = $dbCon;
        if ($conn->connect_error) {
        	die("Connection failed: " . $conn->connect_error);
      	} 

      	$sql = "SELECT * FROM equipment WHERE assest_id = '$q'";
      	$result = $conn->query($sql);

      	if ($result->num_rows > 0) {

		    while($row = $result->fetch_assoc()) {
		        ?>

             
              <div class="form-group">
              <div id="section_<?php echo $row['assest_id']; ?>">
                <table>
                  <tr>
                    <td><input type="hidden" value = "<?php echo $row['assest_id']; ?> " name = "database[]" class="form-control"  readonly></td>
                    <td><input id="input_<?php echo $row['assest_id']; ?>" type="text" value = "<?php echo $row['equipment_name']; ?> "name = "data[]" class="form-control" style="width:95%;"  readonly></td>
                    <td><input type="button" id="delb" name="<?php echo $row['assest_id']; ?>" style="position: static;" class="btn btn-danger" onclick="deleteThis(this.name);" value="Remove"/></td>
                  </tr>
                  </table>
                </div>
              </div>
  

        
        <?php 
      }
		}
}
mysqli_close($conn);

?>