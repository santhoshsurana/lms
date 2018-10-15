<?php require_once("db.class.php");
	$userid=$_GET['userId'];
	$password=md5($_GET['password']);
	$sql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`id` = $userid;";
	mysqli_query($CON, $sql);
	echo "user password changed";
?>