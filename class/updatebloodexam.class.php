<?php require_once("db.class.php");
	$reportId=$_GET['reportId'];
		$haemoglobin=$_GET['haemoglobin']; 
		$total_WBC_count=$_GET['total_WBC_count'];
		$neutrophils=$_GET['neutrophils'];
		$lymphocytes=$_GET['lymphocytes'];
		$eosinophils=$_GET['eosinophils'];
		$monocytese=$_GET['monocytese'];
		$basophils=$_GET['basophils'];
		$ESR=$_GET['ESR'];
		$AEC=$_GET['AEC'];
		$platelet_count=$_GET['platelet_count'];
		$reticulocyte_count=$_GET['reticulocyte_count'];
		$haematocrit_PCV=$_GET['haematocrit_PCV'];
		$bleeding_time=$_GET['bleeding_time'];
		$clotting_time=$_GET['clotting_time'];
		$MCV=$_GET['MCV'];
		$MCH=$_GET['MCH'];
		$MCHC=$_GET['MCHC'];
		$colour_index=$_GET['colour_index'];
		$smear_for_MP=$_GET['smear_for_MP'];
		$smear_for_MF=$_GET['smear_for_MF'];
		$LE_cell_phenomenon=$_GET['LE_cell_phenomenon'];
		$sickle_cell_test=$_GET['sickle_cell_test'];
		$sql = "UPDATE `blood_examination` SET `Haemoglobin` = '".$haemoglobin."', `total_wbc_count` = '".$total_WBC_count."', `Neutrophils` = '".$neutrophils."', `lymphocytes` = '".$lymphocytes."', `eosinophils` = '".$eosinophils."', `monocytes` = '".$monocytese."', `basophils` = '".$basophils."', `E.S.R` = '".$ESR."', `A.E.C` = '".$AEC."', `platelet_count` = '".$platelet_count."', `reticulocyte_count` = '".$reticulocyte_count."', `haematocrit(pcv)` = '".$haematocrit_PCV."', `bleeding_time` = '".$bleeding_time."', `clotting_time` = '".$clotting_time."', `MCV` = '".$MCV."', `MCH` = '".$MCH."', `MCHC` = '".$MCHC."', `colour_index` = '".$colour_index."', `smear_for_M.P` = '".$smear_for_MP."', `smear_for_M.F` = '".$smear_for_MF."', `L.E_cell_phenomenon` = '".$LE_cell_phenomenon."', `sickle_cell_test` = '".$sickle_cell_test."' WHERE `blood_examination`.`id` = ".$reportId.";";
	mysqli_query($CON, $sql);
	echo "blood examination report updated!";
?>