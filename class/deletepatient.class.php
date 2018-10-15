<?php require_once("db.class.php");
$patientId=$_POST['patientId'];
	$sql = "DELETE FROM `patients` WHERE `id`=".$patientId;
	mysqli_query($CON, $sql);
	echo"Patient account deleted";
	
?>