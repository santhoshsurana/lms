<?php require_once("db.class.php");
	$test_name=$_POST['test_name'];
	$test_type=$_POST['test_type'];
	$patient_id=$_POST['patient_id'];
	$total_amount=$_POST['total_amount'];
	$paid_amount=$_POST['paid_amount'];
	$due_amount=$_POST['due_amount'];
	$sql = "INSERT INTO `tests` (`id`, `test_name`, `test_type`, `patient_name`, `total_amount`, `paid_amount`, `due_amount`, `date`) VALUES (NULL, '$test_name', '$test_type', '$patient_id', '$total_amount', '$paid_amount', '$due_amount', CURRENT_TIMESTAMP);";
	mysqli_query($CON, $sql);
	
if($test_type!=0){
$sql = "SELECT `id` FROM `tests` WHERE `test_name`=$test_name AND `test_type`=$test_type AND `patient_name`=$patient_id ORDER BY `date` DESC ";
$result=mysqli_query($CON, $sql);
$data=mysqli_fetch_array($result);
$reportid=$data[0];
	
switch($test_name){
	case 1:
	$sql = "INSERT INTO `blood_examination` (`id`, `Haemoglobin`, `total_wbc_count`, `Neutrophils`, `lymphocytes`, `eosinophils`, `monocytes`, `basophils`, `E.S.R`, `A.E.C`, `platelet_count`, `reticulocyte_count`, `haematocrit(pcv)`, `bleeding_time`, `clotting_time`, `MCV`, `MCH`, `MCHC`, `colour_index`, `smear_for_M.P`, `smear_for_M.F`, `L.E_cell_phenomenon`, `sickle_cell_test`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 2:
	$sql = "INSERT INTO `urine_examination` (`id`, `albumin`, `phosphates`, `sugar(Fasting)`, `sugar(P.P)`, `sugar(random)`, `wbc_puss_cells`, `rbc`, `epithelial_cells`, `casts`, `crystals`, `colour`, `appearance`, `sediment`, `ph_reaction`, `specific_gravity`, `bile_salts`, `bile_pigments`, `urobilinogen`, `ketone`, `nitrite`, `ketone_bodies_acetone`, `chyle`, `bence_zence_protein`, `occult_blood`, `pregnancy_test`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 3:
	$sql = "INSERT INTO `blood_bank` (`id`, `blood_group`, `rh_typing`) VALUES ('$reportid', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 4:
	$sql = "INSERT INTO `bio_chemistry` (`id`, `sugar_fasting`, `sugar_P.P`, `sugar_random`, `urea`, `s_creatinine`, `total_cholestrol`, `hdl_cholestrol`, `vldl_cholestrol`, `ldl`, `triglycerides`, `vanden_bergh_reaction`, `total_bilirubin`, `direct_bilirubin`, `indirect_bilirubin`, `sgpt`, `sgot`, `alkaline_phosphatase`, `acid_phosphatase`, `acid_phosphatase_prostatic`, `total_protein`, `albumin`, `globulin`, `ag_ratio`, `calcium`, `phosphorous`, `uric_acid`, `serum_amylase`, `fibrinogen`, `prothrombin_test`, `prothrombin_control`, `prothrombin_index`, `prothrombin_ratio`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 5:
	$sql = "INSERT INTO `serum_electrolyte` (`id`, `sodium_na`, `potassium_k`, `Chlorides`, `calcium`) VALUES ('$reportid', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 6: 
	$sql = "INSERT INTO `serology` (`id`, `vdrl`, `tpha`, `hepatitisb`, `hiv`, `hepatitisc`, `ra_factor`, `aso_test`, `crp`, `mantoux_test`, `sputum_for_afb`, `salmonella_typhi_o`, `salmonella_typhi_h`, `salmonella_typhi_ah`, `salmonella_typhi_bh`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 7: 
	$sql = "INSERT INTO `csf_analysis` (`id`, `cell_count`, `type_of_cells`, `pandys_test`, `globulin`, `total_protein`, `sugar`, `chlorides`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 8: 
	$sql = "INSERT INTO `semen_analysis` (`id`, `volume`, `reaction_ph`, `viscosity`, `count`, `colour`, `puss_cells`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 9: 
	$sql = "INSERT INTO `stool_examination` (`id`, `colour`, `consistency`, `mucous`, `ph_reaction`, `reducing_substances`, `occult_blood`, `ova`, `cysts`, `puss_cells`, `rbc`) VALUES ('$reportid', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 10: 
	$sql = "INSERT INTO `ada_levels` (`id`, `nature_of_specimen`, `result`, `normal`) VALUES ('$reportid', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 11: 
	$sql = "INSERT INTO `cholinesterase` (`id`, `result`, `Females`, `Males`) VALUES ('$reportid', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 12: 
	$sql = "INSERT INTO `plasma_fibrinogen` (`id`, `result`, `normal`) VALUES ('$reportid', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 13: 
	$sql = "INSERT INTO `glucose_tolerance` (`id`, `fasting_glucose`, `hour1`, `hour2`, `hour3`) VALUES ('$reportid', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	break;
	case 99: 
	break;		
	}
}
	
	
?>