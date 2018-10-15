<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
	$sodium_Na=$_GET['sodium_Na']; 
	$potassium_K=$_GET['potassium_K']; 
	$chlorides=$_GET['chlorides']; 
	$calcium=$_GET['calcium'];
	$sql = "UPDATE `serum_electrolyte` SET `sodium_na` = '".$sodium_Na."', `potassium_k` = '".$potassium_K."', `Chlorides` = '".$chlorides."', `calcium` = '".$calcium."' WHERE `serum_electrolyte`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "serum electrolyte report updated!";
?>