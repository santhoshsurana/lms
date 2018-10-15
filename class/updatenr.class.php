<?php require_once("db.class.php");
	$NRid=$_GET['NRid'];
	$NRvalue=$_GET['NRvalue'];
	$sql = "UPDATE `settings` SET `Normal_value` = '$NRvalue' WHERE `settings`.`id` = $NRid;";
	mysqli_query($CON, $sql);
	echo "value updated";
?>