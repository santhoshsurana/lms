<?php require_once("db.class.php");
	$reportId=$_POST['reportId'];
	$blood_group=$_POST['blood_group'];
	$rh_typing=$_POST['rh_typing'];
	$sql = "UPDATE `blood_bank` SET `blood_group` = '".$blood_group."', `rh_typing` = '".$rh_typing."' WHERE `blood_bank`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "blood bank report updated!";
?>