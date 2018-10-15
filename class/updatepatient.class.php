<?php require_once("db.class.php");
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$ref=$_POST['ref'];
	$patientId=$_POST['patientId'];
	$sql = "UPDATE `patients` SET `first_name` = '$firstname', `last_name` = '$lastname', `age` = '$age', `gender` = '$gender', `phone` = '$phone', `reference` = '$ref' WHERE `patients`.`id` = $patientId;";
	mysqli_query($CON, $sql);
	echo "patient information updated!";
?>