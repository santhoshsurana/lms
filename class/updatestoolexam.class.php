<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
	$colour=$_GET['colour'];
	$consistency=$_GET['consistency'];
	$mucous=$_GET['mucous'];
	$Ph_reaction=$_GET['Ph_reaction'];
	$reducing_substances=$_GET['reducing_substances'];
	$occult_blood=$_GET['occult_blood'];
	$OVA=$_GET['OVA'];
	$CYSTS=$_GET['CYSTS'];
	$puss_cells=$_GET['puss_cells'];
	$RBC=$_GET['RBC'];
	$sql = "UPDATE `stool_examination` SET `colour` = '".$colour."', `consistency` = '".$consistency."', `mucous` = '".$mucous."', `ph_reaction` = '".$Ph_reaction."', `reducing_substances` = '".$reducing_substances."', `occult_blood` = '".$occult_blood."', `ova` = '".$OVA."', `cysts` = '".$CYSTS."', `puss_cells` = '".$puss_cells."', `rbc` = '".$RBC."' WHERE `stool_examination`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "stool examination report updated!";
?>