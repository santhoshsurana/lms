<?php require_once("db.class.php");
	$reportId=$_POST['reportId'];
	$plasma_fibrinogen=$_POST['plasma_fibrinogen'];
	$normal=$_POST['normal'];
	$sql = "UPDATE `plasma_fibrinogen` SET `result` = '$plasma_fibrinogen', `normal` = '$normal' WHERE `plasma_fibrinogen`.`id` =".$reportId;
	mysqli_query($CON, $sql);
	echo "Plasma Fibrinogen report updated!";
?>