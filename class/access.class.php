<?php session_start();
require_once("db.class.php");

	if(!isset($_SESSION['username']))
	{
		echo '0';
	}
	
?>