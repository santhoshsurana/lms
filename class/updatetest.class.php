<?php require_once("db.class.php");
	$testId=$_POST['testId'];
	$total_amount=$_POST['total_amount'];
	$paid_amount=$_POST['paid_amount'];
	$balance_amount= $total_amount-$paid_amount;
	$sql = "UPDATE `tests` SET `total_amount` = '$total_amount', `paid_amount` = '$paid_amount', `due_amount` = '$balance_amount' WHERE `tests`.`id` = $testId;";
	mysqli_query($CON, $sql);
	echo '1';
?>