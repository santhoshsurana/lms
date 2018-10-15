<?php require_once("db.class.php");
	$reportId=$_POST['reportId'];
	$nature_specimen=$_POST['nature_specimen'];
	$result=$_POST['result'];
	$normal=$_POST['normal'];
	$sql = "UPDATE `ada_levels` SET `nature_of_specimen` = '$nature_specimen', `result` = '$result', `normal` = '$normal' WHERE `ada_levels`.`id` =".$reportId;;
	mysqli_query($CON, $sql);
	echo "A.D.A levels report updated!";
?>