<?php require_once("db.class.php");
	
	$userId=$_POST['userId'];
	$sql = "DELETE FROM `users` WHERE `id`='$userId'";
	mysqli_query($CON, $sql);
	echo"User account deleted";
	
?>