<?php session_start();
	require_once("db.class.php");
	$username=$_SESSION['username'];
	$sql = "SELECT `role` FROM `users` WHERE `username`= '$username' ";
	$result=mysqli_query($CON, $sql);
	$data=mysqli_fetch_array($result);
	echo $data['role'];
	
?>