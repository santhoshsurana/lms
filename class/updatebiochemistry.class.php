<?php require_once("db.class.php");
		$reportId=$_GET['reportId']; 
		$sugar_fasting=$_GET['sugar_fasting']; 
		$sugar_pp=$_GET['sugar_pp'];
		$sugar_random=$_GET['sugar_random'];
		$urea=$_GET['urea'];
		$s_creatinine=$_GET['s_creatinine'];
		$total_cholestrol=$_GET['total_cholestrol'];
		$HDL_cholestrol=$_GET['HDL_cholestrol'];
		$VLDL_cholestrol=$_GET['VLDL_cholestrol'];
		$LDL=$_GET['LDL'];
		$triglycerides=$_GET['triglycerides'];
		$vanden_berghs_reaction=$_GET['vanden_berghs_reaction'];
		$total_bilirubin=$_GET['total_bilirubin'];
		$direct_bilirubin=$_GET['direct_bilirubin'];
		$direct_bilirubin=$_GET['direct_bilirubin'];
		$indirect_bilirubin=$_GET['indirect_bilirubin'];
		$SGPT=$_GET['SGPT'];
		$SGOT=$_GET['SGOT'];
		$alkaline_phosphatase=$_GET['alkaline_phosphatase'];
		$ACID_phosphatase=$_GET['ACID_phosphatase'];
		$ACID_phosphatase_prostatic=$_GET['ACID_phosphatase_prostatic'];
		$total_protein=$_GET['total_protein'];
		$albumin=$_GET['albumin'];
		$globulin=$_GET['globulin'];
		$AG_ratio=$_GET['AG_ratio'];
		$calcium=$_GET['calcium'];
		$phosphorous=$_GET['phosphorous'];
		$cric_acid=$_GET['cric_acid'];
		$serum_amylase=$_GET['serum_amylase'];
		$fibrinogen=$_GET['fibrinogen'];
		$prothrombin_test=$_GET['prothrombin_test'];
		$prothrombin_control=$_GET['prothrombin_control'];
		$prothrombin_index=$_GET['prothrombin_index'];
		$prothrombin_ratio=$_GET['prothrombin_ratio'];
	
	
	
	
	
	$sql = "UPDATE `bio_chemistry` SET `sugar_fasting` = '".$sugar_fasting."', `sugar_P.P` = '".$sugar_pp."', `sugar_random` = '".$sugar_random."', `urea` = '".$urea."', `s_creatinine` = '".$s_creatinine."', `total_cholestrol` = '".$total_cholestrol."', `hdl_cholestrol` = '".$HDL_cholestrol."', `vldl_cholestrol` = '".$VLDL_cholestrol."', `ldl` = '".$LDL."', `triglycerides` = '".$triglycerides."', `vanden_bergh_reaction` = '".$vanden_berghs_reaction."', `total_bilirubin` = '".$total_bilirubin."', `direct_bilirubin` = '".$direct_bilirubin."', `indirect_bilirubin` = '".$indirect_bilirubin."', `sgpt` = '".$SGPT."', `sgot` = '".$SGOT."', `alkaline_phosphatase` = '".$alkaline_phosphatase."', `acid_phosphatase` = '".$ACID_phosphatase."', `acid_phosphatase_prostatic` = '".$ACID_phosphatase_prostatic."', `total_protein` = '".$total_protein."', `albumin` = '".$albumin."', `globulin` = '".$globulin."', `ag_ratio` = '".$AG_ratio."', `calcium` = '".$calcium."', `phosphorous` = '".$phosphorous."', `uric_acid` = '".$cric_acid."', `serum_amylase` = '".$serum_amylase."', `fibrinogen` = '".$fibrinogen."', `prothrombin_test` = '".$prothrombin_test."', `prothrombin_control` = '".$prothrombin_control."', `prothrombin_index` = '".$prothrombin_index."', `prothrombin_ratio` = '".$prothrombin_ratio."' WHERE `bio_chemistry`.`id` = ".$reportId.";";
	mysqli_query($CON, $sql);
	echo "Bio-chemistry report updated!";
?>