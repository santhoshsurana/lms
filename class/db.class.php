<?php 
$DB_HOST = "Localhost";
$DB_NAME = "lms";
$DB_USERNAME = "root";
$DB_PASSWORD = "root";
$CON = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME) or trigger_error(mysqli_error(),E_USER_ERROR);
?>