<?php require_once("db.class.php");
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$ref=$_POST['ref'];
$sql = "INSERT INTO `patients` (`id`, `first_name`, `last_name`, `age`, `gender`, `phone`, `reference`, `date`) VALUES (NULL, '$firstname', '$lastname', '$age', '$gender', '$phone', '$ref', CURRENT_TIMESTAMP);";
	mysqli_query($CON, $sql);
	echo "patient added to LMS";
?>