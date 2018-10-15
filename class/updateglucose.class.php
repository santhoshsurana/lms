<?php require_once("db.class.php");
	$reportId=$_POST['reportId'];
	$fasting_glucose=$_POST['fasting_glucose'];
	$hour1=$_POST['hour1'];
	$hour2=$_POST['hour2'];
	$hour3=$_POST['hour3'];
	$sql = "UPDATE `glucose_tolerance` SET `fasting_glucose` = '$fasting_glucose', `hour1` = '$hour1', `hour2` = '$hour2', `hour3` = '$hour3' WHERE `glucose_tolerance`.`id` =".$reportId;
	mysqli_query($CON, $sql);
	echo "Glucose Tolerance report updated!";
?>