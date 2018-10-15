<?php require_once("db.class.php");

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$role=$_POST['role'];
	$sql = "INSERT INTO `users` (`id`, `username`, `password`, `role`, `date`) VALUES (NULL, '$username', '$password', '$role', CURRENT_TIMESTAMP);";
	mysqli_query($CON, $sql);
	echo "User account created!";
	
?>