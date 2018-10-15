<?php 
require_once("db.class.php");

	$id=$_GET['id'];
	$sql = "SELECT * FROM `patients` WHERE `id`='$id'";
	$result=mysqli_query($CON, $sql);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		echo "1";
	}
	else{
		echo "0";
	}


?>