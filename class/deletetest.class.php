<?php require_once("db.class.php");
$testId=$_POST['testId'];
	$sql = "DELETE FROM `tests` WHERE `tests`.`id` =".$testId;
	mysqli_query($CON, $sql);
	echo "Test deleted";
	
?>