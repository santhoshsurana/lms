<?php session_start();
require_once("db.class.php");

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$sql = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password'";
	$result=mysqli_query($CON, $sql);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		$_SESSION['username']=$username;
		echo "1";
	}
	else{
		echo "0";
	}
	
?>