<?php require 'connection.php'; ?>
<?php

@mysql_select_db("controlroom_141") or ("Unable to connect Database");

if(isset($_POST['update'])){
$UpdateQuery ="UPDATE equipment SET equipment_name='$_POST[equipname]', equipment_type='$_POST[equiptype]' WHERE equipment_name='$_POST[hidden]'";
mysql_query($UpdateQuery);

echo "<script type='text/javascript'>alert('Update Successfully!');</script>";;
}

$query = mysql_query("SELECT * FROM equipment");
 ?>
