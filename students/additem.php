 <tr id="section_<?php echo $row['assest_id']; ?>">
	<td><input type="hidden" value = "<?php echo $row['assest_id']; ?> " name = "database[]" class="form-control"  readonly></td>
	<td><input id="input_<?php echo $row['assest_id']; ?>" type="text" value = "<?php echo $row['equipment_name']; ?> " name = "data[]" class="form-control" style="width:95%;"  readonly></td>
	<td><input id="qtyinput_<?php echo $row['assest_id']; ?>" type="text" value = "<?php echo $qty; ?>" name = "qtydata[]" class="form-control" style="width:95%;"  readonly></td>
	<td style="width: 70px;"><button id="delb" name="<?php echo $row['assest_id']; ?>" class="btn btn-danger" onclick="deleteThis(this.name,<?php echo $row['qty']; ?>);"><span class="fa fa-trash"> </span> </button></td>
</tr>