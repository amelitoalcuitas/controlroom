<?php require 'connection.php' ?>

<?php
	 
          
 
  	if(isset($_GET))
   {
    $q = $_GET['q'];
    $qty = $_GET['qty'];

        $conn = $dbCon;
        if ($conn->connect_error) {
        	die("Connection failed: " . $conn->connect_error);
      	} 

      	$sql = "SELECT * FROM equipment WHERE assest_id = '$q'";

        $sql2 = $dbCon->query("UPDATE equipment SET qty = (qty-$qty) WHERE assest_id = $q");


      	$result = $conn->query($sql);

      	if ($result->num_rows > 0) {

		    while($row = $result->fetch_assoc()) {
		        ?>
              <tr id="section_<?php echo $row['assest_id']; ?>">
                <td><input type="hidden" value = "<?php echo $row['assest_id']; ?> " name = "database[]" class="form-control"  readonly></td>
                <td><input id="input_<?php echo $row['assest_id']; ?>" type="text" value = "<?php echo $row['equipment_name']; ?> " name = "data[]" class="form-control" style="width:95%;"  readonly></td>
                <td><input id="input_<?php echo $row['assest_id']; ?>" type="text" value = "<?php echo $qty; ?>" name = "qtydata[]" class="form-control" style="width:95%;"  readonly></td>
                <td style="width: 70px;"><button id="delb" name="<?php echo $row['assest_id']; ?>" class="btn btn-danger" onclick="deleteThis(this.name);"><span class="fa fa-trash"> </span> </button></td>
              </tr>
        <?php 
      }
		}
}
mysqli_close($conn);

?>