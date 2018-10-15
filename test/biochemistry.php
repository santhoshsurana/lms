<?php require_once( '../class/db.class.php'); 
	$test_id=$_GET['testId']; 
	$sql="SELECT * FROM `bio_chemistry` WHERE `id`=" .$test_id; 
	$result=mysqli_query($CON, $sql); 
	$biochem_test=mysqli_fetch_array($result); 
	?>
<button onClick="display('class/viewtest.class.php?p=0')" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,4);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateBiochemistry(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,4);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Bio Chemistry test</h3>
<div id="test_div">
    <form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='SugarFasting'>Sugar Fasting</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_fasting' required value='<?php echo $biochem_test[1]; ?>' name='SugarFasting' placeholder='enter SugarFasting' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='SugarP.P'>Sugar P.P</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_pp' required value='<?php echo $biochem_test[2]; ?>' name='SugarP.P' placeholder='enter SugarP.P' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='SugarRandom'>Sugar Random</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_random' required value='<?php echo $biochem_test[3]; ?>' name='SugarRandom' placeholder='enter SugarRandom' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Urea'>Urea</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='urea' required value='<?php echo $biochem_test[4]; ?>' name='Urea' placeholder='enter Urea' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='S.Creatininee'>S.Creatinine</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='s_creatinine' required value='<?php echo $biochem_test[5]; ?>' name='S.Creatinine' placeholder='enter S.Creatinine' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Total Cholestrol'>Total Cholestrol</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='total_cholestrol' required value='<?php echo $biochem_test[6]; ?>' name='Total Cholestrol' placeholder='enter Total Cholestrol' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='HDL Cholestrol'>HDL Cholestrol</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='HDL_cholestrol' required value='<?php echo $biochem_test[7]; ?>' name='HDL Cholestrol' placeholder='enter HDL Cholestrol' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='VLDL Cholestrol'>VLDL Cholestrol</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='VLDL_cholestrol' required value='<?php echo $biochem_test[8]; ?>' name='VLDL Cholestrol' placeholder='enter VLDL Cholestrol' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='LDL'>LDL</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='LDL' required value='<?php echo $biochem_test[9]; ?>' name='LDL' placeholder='enter LDL' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Triglycerides'>Triglycerides</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='triglycerides' required value='<?php echo $biochem_test[10]; ?>' name='Triglycerides' placeholder='enter Triglycerides' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Vanden Bergh’s Reaction'>Vanden Bergh’s Reaction</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='vanden_berghs_reaction' required value='<?php echo $biochem_test[11]; ?>' name='Vanden Bergh’s Reaction' placeholder='enter Vanden Bergh’s Reaction' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Total Bilirubin'>Total Bilirubin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='total_bilirubin' required value='<?php echo $biochem_test[12]; ?>' name='Total Bilirubin' placeholder='enter Total Bilirubin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Direct Bilirubin'>Direct Bilirubin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='direct_bilirubin' required value='<?php echo $biochem_test[13]; ?>' name='Direct Bilirubin' placeholder='enter Direct Bilirubin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Indirect Bilirubin'>Indirect Bilirubin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='indirect_bilirubin' required value='<?php echo $biochem_test[14]; ?>' name='Indirect Bilirubin' placeholder='enter Indirect Bilirubin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='S.G.P.T'>S.G.P.T</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='SGPT' required value='<?php echo $biochem_test[15]; ?>' name='S.G.P.T' placeholder='enter S.G.P.T' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='S.G.O.T'>S.G.O.T</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='SGOT' required value='<?php echo $biochem_test[16]; ?>' name='S.G.O.T' placeholder='enter S.G.O.T' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Alkaline Phosphatase'>Alkaline Phosphatase</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='alkaline_phosphatase' required value='<?php echo $biochem_test[17]; ?>' name='Alkaline Phosphatase' placeholder='enter Alkaline Phosphatase' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='ACID Phosphatase'>ACID Phosphatase</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ACID_phosphatase' required value='<?php echo $biochem_test[18]; ?>' name='ACID Phosphatase' placeholder='enter ACID Phosphatase' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='ACID PhosphataseProstatic'>ACID PhosphataseProstatic </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ACID_phosphatase_prostatic' required value='<?php echo $biochem_test[19]; ?>' name='ACID PhosphataseProstatic' placeholder='enter ACID PhosphataseProstatic' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Total Protein'>Total Protein</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='total_protein' required value='<?php echo $biochem_test[20]; ?>' name='Total Protein' placeholder='enter Total Protein' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Albumin'>Albumin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='albumin' required value='<?php echo $biochem_test[21]; ?>' name='Albumin' placeholder='enter Albumin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Globulin'>Globulin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='globulin' required value='<?php echo $biochem_test[22]; ?>' name='Globulin' placeholder='enter Globulin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='A/G Ratio'>A/G Ratio</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='AG_ratio' required value='<?php echo $biochem_test[23]; ?>' name='A/G Ratio' placeholder='enter A/G Ratio' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Calcium'>Calcium</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='calcium' required value='<?php echo $biochem_test[24]; ?>' name='Calcium' placeholder='enter Calcium' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Phosphorous'>Phosphorous </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='phosphorous' required value='<?php echo $biochem_test[25]; ?>' name='Phosphorous' placeholder='enter Phosphorous' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Uric Acid'>Uric Acid </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='cric_acid' required value='<?php echo $biochem_test[26]; ?>' name='Uric Acid' placeholder='enter Uric Acid' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Serum Amylase'>Serum Amylase </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='serum_amylase' required value='<?php echo $biochem_test[27]; ?>' name='Serum Amylase' placeholder='enter Serum Amylase' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Fibrinogen '>Plasma Fibrinogen   </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='fibrinogen' required value='<?php echo $biochem_test[28]; ?>' name='Fibrinogen ' placeholder='enter Fibrinogen ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Prothrombin Test'>Prothrombin Test  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='prothrombin_test' required value='<?php echo $biochem_test[29]; ?>' name='Prothrombin Test' placeholder='enter Prothrombin Test' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Prothrombin Control'>Prothrombin Control  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='prothrombin_control' required value='<?php echo $biochem_test[30]; ?>' name='Prothrombin Control' placeholder='enter Prothrombin Control' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Prothrombin Index '>Prothrombin Index  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='prothrombin_index' required value='<?php echo $biochem_test[31]; ?>' name='Prothrombin Index ' placeholder='enter Prothrombin Index ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Prothrombin Ratio'>Prothrombin Ratio  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='prothrombin_ratio' required value='<?php echo $biochem_test[32]; ?>' name='Prothrombin Ratio' placeholder='enter Prothrombin Ratio' />
            </div>
        </div>
    </form>
</div>
<div id="report_div">
    <?php 
	$sql="SELECT `first_name`,`last_name`,`age`,`gender`,`reference`,`date` FROM `patients` WHERE `id`=( select `patient_name` from tests where `id`=" .$test_id. ")"; 
	$result=mysqli_query($CON, $sql); 
	$data=mysqli_fetch_array($result); 
	if($data['gender']==1){ $data[ 'gender']="male" ; }
	elseif($data[ 'gender']==0){$data[ 'gender']="female" ;} 
	$date=date( "d-m-Y", strtotime($data[ 'date'])); 
	$sql="SELECT `Normal_value` FROM `settings` WHERE `test_name`=3 " ; 
	$result=mysqli_query($CON, $sql); 
	$NRvalues=array(); 
	while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){
		 $NRvalues[]=$row['Normal_value']; 
		 } ?>
         <table class='table table-hover table-bordered'>
            <tr>
                <td>Sno</td>
                <td>:</td>
                <td>
                    <?php echo $test_id; ?>
                </td>
                <td>Date</td>
                <td>:</td>
                <td>
                    <?php echo $date; ?>
                </td>
            </tr>
            <tr>
                <td>Patient Name</td>
                <td>:</td>
                <td>
                    <?php echo $data[ 'first_name']; ?>
                    <?php echo $data[ 'last_name']; ?>
                </td>
                <td>Age</td>
                <td>:</td>
                <td>
                    <?php echo $data[ 'age']; ?>
                </td>
            </tr>
            <tr>
                <td>Ref. Dr.</td>
                <td>:</td>
                <td> Dr.<?php echo $data[ 'reference']; ?></td>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <?php echo $data[ 'gender']; ?>
                </td>
            </tr>
            </table>
           <table class='table table-hover table-bordered'>
        <tr>
            <td colspan='4'>
                <u><h4 align='center'>Bio-Chemistry Report</h4></u>
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
            <th>Noraml range</th>
        </tr>

        <?php if($biochem_test[1]!='-' ){?>
        <tr>
            <td>Sugar ( fasting )</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[1]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[0]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[2]!='-' ){?>
        <tr>
            <td>Sugar ( P.P )</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[2]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[1]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[3]!='-' ){?>
        <tr>
            <td>Sugar ( Random )</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[3]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[2]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[4]!='-' ){?>
        <tr>
            <td>Urea</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[4]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[3]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[5]!='-' ){?>
        <tr>
            <td>S.Creatinine</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[5]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[4]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[6]!='-' ){?>
        <tr>
            <td>Total Cholestrol</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[6]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[5]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[7]!='-' ){?>
        <tr>
            <td>HDL Cholestrol</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[7]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[6]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[8]!='-' ){?>
        <tr>
            <td>VLDL Cholestrol</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[8]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[7]; ?>mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[9]!='-' ){?>
        <tr>
            <td>LDL</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[9]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[8]; ?>mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[10]!='-' ){?>
        <tr>
            <td>Triglycerides</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[10]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[9]; ?>mg/dl ( 2.3 mmol/L)</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[11]!='-' ){?>
        <tr>
            <td>Vanden Bergh’s Reaction</td>
            <td>:</td>
            <td colspan="2">
                <?php echo $biochem_test[11]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($biochem_test[12]!='-' ){?>
        <tr>
            <td>Total Bilirubin</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[12]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[10]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[13]!='-' ){?>
        <tr>
            <td>Direct Bilirubin</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[13]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[11]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[14]!='-' ){?>
        <tr>
            <td>Indirect Bilirubin</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[14]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[12]; ?> mgs/dl</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[15]!='-' ){?>
        <tr>
            <td>S.G.P.T</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[15]; ?>IU/L</td>
            <td>
                <?php echo $NRvalues[13]; ?> IU/L</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[16]!='-' ){?>
        <tr>
            <td>S.G.O.T</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[16]; ?>IU/L</td>
            <td>
                <?php echo $NRvalues[14]; ?>IU/L</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[17]!='-' ){?>
        <tr>
            <td>Alkaline Phosphatase</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[17]; ?>IU/L</td>
            <td>
                <?php echo $NRvalues[15]; ?> IU/L</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[18]!='-' ){?>
        <tr>
            <td>ACID Phosphatase</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[18]; ?>KAU</td>
            <td>
                <?php echo $NRvalues[16]; ?> KAU</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[19]!='-' ){?>
        <tr>
            <td>ACID Phosphatase( Prostatic ) </td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[19]; ?>KAU</td>
            <td>
                <?php echo $NRvalues[17]; ?> KAU</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[20]!='-' ){?>
        <tr>
            <td>Total Protein</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[20]; ?>gms/dl</td>
            <td>
                <?php echo $NRvalues[18]; ?> gms/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[21]!='-' ){?>
        <tr>
            <td>Albumin</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[21]; ?>gms/dl</td>
            <td>
                <?php echo $NRvalues[19]; ?> gms/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[22]!='-' ){?>
        <tr>
            <td>Globulin</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[22]; ?>gms/dl</td>
            <td>
                <?php echo $NRvalues[19]; ?> gms/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[23]!='-' ){?>
        <tr>
            <td>A/G Ratio</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[23]; ?>
            </td>
            <td>
                <?php echo $NRvalues[20]; ?> gms/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[24]!='-' ){?>
        <tr>
            <td>Calcium</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[24]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[21]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[25]!='-' ){?>
        <tr>
            <td>Phosphorous </td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[25]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[22]; ?> mgs/dl</td>
        </tr>
        <?php }?>

        <?php if($biochem_test[26]!='-' ){?>
        <tr>
            <td>Uric Acid</td>
            <td>:</td>

            <td>
                <?php echo $biochem_test[26]; ?>mg/dl</td>
            <?php if($data['gender']=="male"){?>
            <td>Male :
                <?php echo $NRvalues[23]; ?> mg/dl</td>
            <?php }else{ ?>
            <td>Women : 
                <?php echo $NRvalues[24]; ?> mg/dl</td>
            <?php }?>


        </tr>
        <?php }?>
        <?php if($biochem_test[27]!='-' ){?>
        <tr>
            <td>Serum Amylase</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[27]; ?>IU/L</td>
            <td>
                <?php echo $NRvalues[25]; ?> IU/L – at 37 C</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[28]!='-' ){?>
        <tr>
            <td>Plasma Fibrinogen</td>
            <td>:</td>
            <td>
                <?php echo $biochem_test[28]; ?>mgs/dl</td>
            <td>
                <?php echo $NRvalues[26]; ?> mgs/dl</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[29]!='-' ){?>
        <tr>
            <td>Prothrombin Test </td>
            <td>:</td>
            <td colspan="2">
                <?php echo $biochem_test[29]; ?>Sec</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[30]!='-' ){?>
        <tr>
            <td>Prothrombin Control</td>
            <td>:</td>
            <td colspan="2">
                <?php echo $biochem_test[30]; ?>Sec</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[31]!='-' ){?>
        <tr>
            <td>Prothrombin Index</td>
            <td>:</td>
            <td colspan="2">
                <?php echo $biochem_test[31]; ?>%</td>
        </tr>
        <?php }?>
        <?php if($biochem_test[32]!='-' ){?>
        <tr>
            <td>Prothrombin Ratio</td>
            <td>:</td>
            <td colspan="2">
                <?php echo $biochem_test[32]; ?>%</td>
        </tr>
        <?php }?>
            <tr>
                <td colspan='6'>
                    <br/><br/><div align='right'>Signature</div>
                </td>
            </tr>
        </table>
            <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>