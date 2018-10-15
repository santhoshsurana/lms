<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
	$cell_cunt=$_GET['cell_cunt'];
	$type_of_cells=$_GET['type_of_cells'];
	$pandy_test=$_GET['pandy_test'];
	$globulin=$_GET['globulin'];
	$total_protein=$_GET['total_protein'];
	$sugar=$_GET['sugar'];
	$chlorides=$_GET['chlorides'];
	$sql = "UPDATE `csf_analysis` SET `cell_count` = '".$cell_cunt."', `type_of_cells` = '".$type_of_cells."', `pandys_test` = '".$pandy_test."', `globulin` = '".$globulin."', `total_protein` = '".$total_protein."', `sugar` = '".$sugar."', `chlorides` = '".$chlorides."' WHERE `csf_analysis`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "C.S.F analysis report updated!";
?>