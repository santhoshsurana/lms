<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
	$VDRL=$_GET['VDRL'];
	$TPHA=$_GET['TPHA'];
	$hepatitisB_hbs_Ag=$_GET['hepatitisB_hbs_Ag'];
	$HIV=$_GET['HIV'];
	$hepatitisC=$_GET['hepatitisC'];
	$ra_factor=$_GET['ra_factor'];
	$ASO_test=$_GET['ASO_test']; 
	$CRP=$_GET['CRP'];
	$mantoux_test=$_GET['mantoux_test'];
	$sputum_for_AFB=$_GET['sputum_for_AFB'];
	$salmonella_typhi_o=$_GET['salmonella_typhi_o'];
	$salmonella_typhi_H=$_GET['salmonella_typhi_H'];
	$salmonella_typhi_AH=$_GET['salmonella_typhi_AH'];
	$salmonella_typhi_BH=$_GET['salmonella_typhi_BH'];
	$sql = "UPDATE `serology` SET `vdrl` = '".$VDRL."', `tpha` = '".$TPHA."', `hepatitisb` = '".$hepatitisB_hbs_Ag."', `hiv` = '".$HIV."', `hepatitisc` = '".$hepatitisC."', `ra_factor` = '".$ra_factor."', `aso_test` = '".$ASO_test."', `crp` = '".$CRP."', `mantoux_test` = '".$mantoux_test."', `sputum_for_afb` = '".$sputum_for_AFB."', `salmonella_typhi_o` = '".$salmonella_typhi_o."', `salmonella_typhi_h` = '".$salmonella_typhi_H."', `salmonella_typhi_ah` = '".$salmonella_typhi_AH."', `salmonella_typhi_bh` = '".$salmonella_typhi_BH."' WHERE `serology`.`id` = $reportId;";
	mysqli_query($CON, $sql);
	echo "Serology report updated!";
?>