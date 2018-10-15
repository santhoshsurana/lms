<?php require_once("db.class.php");
	$test_name=$_POST['test_name'];
	$test_ID=$_POST['testId'];
	
switch($test_name){
	case 1:
	$sql="SELECT * FROM `blood_examination` WHERE `id`=" .$test_ID;
			$result=mysqli_query($CON, $sql);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `blood_examination` (`id`, `Haemoglobin`, `total_wbc_count`, `Neutrophils`, `lymphocytes`, `eosinophils`, `monocytes`, `basophils`, `E.S.R`, `A.E.C`, `platelet_count`, `reticulocyte_count`, `haematocrit(pcv)`, `bleeding_time`, `clotting_time`, `MCV`, `MCH`, `MCHC`, `colour_index`, `smear_for_M.P`, `smear_for_M.F`, `L.E_cell_phenomenon`, `sickle_cell_test`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
	echo '1';
        }else{echo '0';}
	break;
	case 2:
	$sql = "SELECT * FROM `urine_examination` WHERE `id`=".$test_ID;
			$result=mysqli_query($CON, $sql);
			$urine_exam = mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `urine_examination` (`id`, `albumin`, `phosphates`, `sugar(Fasting)`, `sugar(P.P)`, `sugar(random)`, `wbc_puss_cells`, `rbc`, `epithelial_cells`, `casts`, `crystals`, `colour`, `appearance`, `sediment`, `ph_reaction`, `specific_gravity`, `bile_salts`, `bile_pigments`, `urobilinogen`, `ketone`, `nitrite`, `ketone_bodies_acetone`, `chyle`, `bence_zence_protein`, `occult_blood`, `pregnancy_test`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 3:
	    	$sql="SELECT * FROM `blood_bank` WHERE `id`=" .$test_ID;
			$result=mysqli_query($CON, $sql);
			$bloodbank=mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `blood_bank` (`id`, `blood_group`, `rh_typing`) VALUES ('$test_ID', '-', '-');";
			mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 4:
	  	$sql="SELECT * FROM `bio_chemistry` WHERE `id`=" .$test_ID;
			$result=mysqli_query($CON, $sql);
			$count=mysqli_num_rows($result);
			$biochem_test=mysqli_fetch_array($result);
 			if($count==0){
			$sql = "INSERT INTO `bio_chemistry` (`id`, `sugar_fasting`, `sugar_P.P`, `sugar_random`, `urea`, `s_creatinine`, `total_cholestrol`, `hdl_cholestrol`, `vldl_cholestrol`, `ldl`, `triglycerides`, `vanden_bergh_reaction`, `total_bilirubin`, `direct_bilirubin`, `indirect_bilirubin`, `sgpt`, `sgot`, `alkaline_phosphatase`, `acid_phosphatase`, `acid_phosphatase_prostatic`, `total_protein`, `albumin`, `globulin`, `ag_ratio`, `calcium`, `phosphorous`, `uric_acid`, `serum_amylase`, `fibrinogen`, `prothrombin_test`, `prothrombin_control`, `prothrombin_index`, `prothrombin_ratio`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 5:
	$sql = "SELECT * FROM `serum_electrolyte` WHERE `id`=".$test_ID;
			$result=mysqli_query($CON, $sql);
			$serum_exam = mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `serum_electrolyte` (`id`, `sodium_na`, `potassium_k`, `Chlorides`, `calcium`) VALUES ('$test_ID', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 6: 
	$sql = "SELECT * FROM `serology` WHERE `id`=".$test_ID;
			$result=mysqli_query($CON, $sql);
			$serology_exam = mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `serology` (`id`, `vdrl`, `tpha`, `hepatitisb`, `hiv`, `hepatitisc`, `ra_factor`, `aso_test`, `crp`, `mantoux_test`, `sputum_for_afb`, `salmonella_typhi_o`, `salmonella_typhi_h`, `salmonella_typhi_ah`, `salmonella_typhi_bh`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 7: 
	$sql = "SELECT * FROM `csf_analysis` WHERE `id`=".$test_ID;
				$result=mysqli_query($CON, $sql);
				$csf_exam = mysqli_fetch_array($result);
				$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `csf_analysis` (`id`, `cell_count`, `type_of_cells`, `pandys_test`, `globulin`, `total_protein`, `sugar`, `chlorides`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 8: 
	$sql = "SELECT * FROM `semen_analysis` WHERE `id`=".$test_ID;
			$result=mysqli_query($CON, $sql);
			$semen_exam = mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `semen_analysis` (`id`, `volume`, `reaction_ph`, `viscosity`, `count`, `colour`, `puss_cells`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;
	case 9: 
	$sql = "SELECT * FROM `stool_examination` WHERE `id`=".$test_ID ;
			$result=mysqli_query($CON, $sql);
			$stool_exam = mysqli_fetch_array($result);
			$count=mysqli_num_rows($result);
			if($count==0){ 
			$sql = "INSERT INTO `stool_examination` (`id`, `colour`, `consistency`, `mucous`, `ph_reaction`, `reducing_substances`, `occult_blood`, `ova`, `cysts`, `puss_cells`, `rbc`) VALUES ('$test_ID', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');";
	mysqli_query($CON, $sql);
    echo '1';
        }else{echo '0';}
	break;	
	}
	
	
?>