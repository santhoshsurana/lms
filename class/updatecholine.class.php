<?php require_once("db.class.php");
	$reportId=$_POST['reportId'];
	$cholinesterase_result=$_POST['cholinesterase_result'];
	$female=$_POST['female'];
	$male=$_POST['male'];
	$sql = "UPDATE `cholinesterase` SET `result` = '$cholinesterase_result', `Females` = '$female', `Males` = '$male' WHERE `cholinesterase`.`id` =".$reportId;
	mysqli_query($CON, $sql);
	echo "cholinesterase report updated!";
?>