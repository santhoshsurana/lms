<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
	$volume=$_GET['volume'];
	$reaction_Ph=$_GET['reaction_Ph'];
	$viscosity=$_GET['viscosity'];
	$count=$_GET['count'];
	$colour=$_GET['colour'];
	$puss_cells=$_GET['puss_cells'];
	$sql = "UPDATE `semen_analysis` SET `volume` = '".$volume."', `reaction_ph` = '".$reaction_Ph."', `viscosity` = '".$viscosity."', `count` = '".$count."', `colour` = '".$colour."', `puss_cells` = '".$puss_cells."' WHERE `semen_analysis`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "Semen analysis report updated!";
?>