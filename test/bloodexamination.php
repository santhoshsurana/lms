<?php require_once( '../class/db.class.php'); 
$test_id=$_GET[ 'testId']; 
$sql="SELECT * FROM `blood_examination` WHERE `id`=".$test_id; 
$result=mysqli_query($CON, $sql); 
$blood_exam=mysqli_fetch_array($result);
$length= (count($blood_exam)/2)-1;
$length=$length-2;
for($i=3;$i<=$length;$i++){
	if($blood_exam[$i]!='-'){
	$flag2=1;
	$i=$length;
	}else{
	$flag2=0;
	}
	}
?>

<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,1);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateBloodexam(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,1);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Blood Examination test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Haemoglobin'>Haemoglobin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='haemoglobin' required value='<?php echo $blood_exam[1]; ?>' name='Haemoglobin' placeholder='enter Haemoglobin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Total WBC Coun'>Total WBC Count</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='total_WBC_count' required value='<?php echo $blood_exam[2]; ?>' name='Total WBC Count' placeholder='enter Total WBC Count' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Neutrophilse'>Neutrophils</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='neutrophils' required value='<?php echo $blood_exam[3]; ?>' name='Neutrophils' placeholder='enter Neutrophils' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Lymphocytes'>Lymphocytes</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='lymphocytes' required value='<?php echo $blood_exam[4]; ?>' name='Lymphocytes' placeholder='enter Lymphocytes' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Eosinophils'>Eosinophils</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='eosinophils' required value='<?php echo $blood_exam[5]; ?>' name='Eosinophils' placeholder='enter Eosinophils' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Monocytes'>Monocytes</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='monocytese' required value='<?php echo $blood_exam[6]; ?>' name='Monocytes' placeholder='enter Monocytes' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Basophils'>Basophils</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='basophils' required value='<?php echo $blood_exam[7]; ?>' name='Basophilse' placeholder='enter Basophils' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='ESR'>E.S.R</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ESR' required value='<?php echo $blood_exam[8]; ?>' name='E.S.R' placeholder='enter E.S.R' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='AEC'>A.E.C</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='AEC' required value='<?php echo $blood_exam[9]; ?>' name='A.E.C' placeholder='enter A.E.C' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='platelet_count'>Platelet Count</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='platelet_count' required value='<?php echo $blood_exam[10]; ?>' name='Platelet Count' placeholder='enter Platelet Count' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Reticulocyte Count'>Reticulocyte Count</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='reticulocyte_count' required value='<?php echo $blood_exam[11]; ?>' name='Reticulocyte Count' placeholder='enter Reticulocyte Count' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='haematocrit_PCV'>Haematocrit ( PCV )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='haematocrit_PCV' required value='<?php echo $blood_exam[12]; ?>' name='Haematocrit ( PCV )' placeholder='enter Haematocrit ( PCV )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Bleeding Time'>Bleeding Time</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='bleeding_time' required value='<?php echo $blood_exam[13]; ?>' name='Bleeding Time' placeholder='enter Bleeding Time' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Clotting Time'>Clotting Time</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='clotting_time' required value='<?php echo $blood_exam[14]; ?>' name='Clotting Time' placeholder='enter Clotting Time' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='MCV'>MCV</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='MCV' required value='<?php echo $blood_exam[15]; ?>' name='MCV' placeholder='enter MCV' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='MCH'>MCH</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='MCH' required value='<?php echo $blood_exam[16]; ?>' name='MCH' placeholder='enter MCH' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='username'>MCHC</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='MCHC' required value='<?php echo $blood_exam[17]; ?>' name='MCHC' placeholder='enter MCHC' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Colour Index'>Colour Index</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='colour_index' required value='<?php echo $blood_exam[18]; ?>' name='Colour Index' placeholder='enter Colour Index' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Smear for M.P'>Smear for M.P </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='smear_for_MP' required value='<?php echo $blood_exam[19]; ?>' name='Smear for M.P' placeholder='enter Smear for M.P' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Smear for M.F'>Smear for M.F</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='smear_for_MF' required value='<?php echo $blood_exam[20]; ?>' name='Smear for M.F' placeholder='enter Smear for M.F' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='L.E. Cell Phenomenon'>L.E. Cell Phenomenon</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='LE_cell_phenomenon' required value='<?php echo $blood_exam[21]; ?>' name='L.E. Cell Phenomenon' placeholder='enter L.E. Cell Phenomenon' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sickle Cell Test'>Sickle Cell Test</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sickle_cell_test' required value='<?php echo $blood_exam[22]; ?>' name='Sickle Cell Test' placeholder='enter Sickle Cell Test' />
            </div>
        </div>
</form>
</div>
<div  id="report_div">
<?php 
$sql = "SELECT `first_name`,`last_name`,`age`,`gender`,`reference`,`date` FROM `patients` WHERE `id`=( select `patient_name` from tests where `id`=".$test_id.")";
$result=mysqli_query($CON, $sql);
$data = mysqli_fetch_array($result);
	if($data['gender']==1){	$data['gender']="male";	}elseif($data['gender']==0){$data['gender']="female";}
	$date=date("d-m-Y", strtotime($data['date']));
	$sql = "SELECT `Normal_value` FROM `settings` WHERE `test_name`=0 ";
	$result=mysqli_query($CON, $sql);
	$NRvalues = Array();
	while ($row = mysqli_fetch_array($result)) {
    $NRvalues[] =  $row['Normal_value'];  
}
?>
<table class='table table-hover table-bordered'>
 <tr>
    <td>Sno</td>
    <td>:</td>
    <td> <?php echo $test_id;?></td>
    <td>Date</td>
    <td>:</td>
    <td> <?php echo $date; ?></td>
    </tr>
            
  <tr>
    <td>Patient Name</td>
    <td>:</td>
    <td> <?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?></td>
    <td>Age</td>
    <td>:</td>
    <td> <?php echo $data['age']; ?></td>
    </tr>
  <tr>
    <td>Ref. Dr.</td>
    <td>:</td>
    <td> Dr.<?php echo $data[ 'reference']; ?></td>
    <td>Gender</td>
    <td>:</td>
    <td><?php echo $data['gender']; ?></td>
  </tr>
  </table>
      <table class='table table-hover table-bordered'>
        <tr>
            <td colspan='4'>
                <div align='center'><u><h4>Blood Examination Report</h4></u>
                </div>
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
            <th>Noraml range</th>
        </tr>

        <?php if($blood_exam[1]!='-' ){?>
        <tr>
            <td>haemoglobin</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[1]; ?>gms%</td>
            <?php if($data[ 'gender']="male" ){?>
            <td>Men: 
                <?php echo $NRvalues[0]; ?>gm%</td>
            <?php }else{ ?>
            <td>Women: 
                <?php echo $NRvalues[1]; ?> gms%</td>
            <?php }?>
        </tr>
        <?php }?>

        <?php if($blood_exam[2]!='-' ){?>
        <tr>
            <td>Total WBC Count</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[2]; ?>Cells/Cmm</td>
            <td>
                <?php echo $NRvalues[2]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($flag2==1){?>
        <tr>
            <td colspan='4'><u><strong>Differential Count:</strong></u>
            </td>
        </tr>
        <?php }?>
        
        <?php if($blood_exam[3]!='-' ){?>
        <tr>
            <td>Neutrophils</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[3]; ?>%</td>
            <td>
                <?php echo $NRvalues[3]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[4]!='-' ){?>
        <tr>
            <td>Lymphocytes</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[4]; ?>%</td>
            <td>
                <?php echo $NRvalues[4]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[5]!='-' ){?>
        <tr>
            <td>Eosinophils</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[5]; ?>%</td>
            <td>
                <?php echo $NRvalues[5]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[6]!='-' ){?>
        <tr>
            <td>Monocytes</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[6]; ?>%</td>
            <td>
                <?php echo $NRvalues[6]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[7]!='-' ){?>
        <tr>
            <td>Basophils</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[7]; ?>%</td>
            <td>
                <?php echo $NRvalues[7]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[8]!='-' ){?>
        <tr>
            <td>E.S.R</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[8]; ?>mm/1st hour</td>
            <?php if($data[ 'gender']="male" ){?>
            <td>Men: 
                <?php echo $NRvalues[8]; ?> mm/ 1st Hr</td>
            <?php }else{ ?>
            <td>Women: 
                <?php echo $NRvalues[9]; ?> mm/ 1st Hr</td>
            <?php }?>
        </tr>
        <?php }?>

        <?php if($blood_exam[9]!='-' ){?>
        <tr>
            <td>A.E.C</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[9]; ?>Cells/Cmm</td>
            <td>
                <?php echo $NRvalues[10]; ?> Cells/Cmm</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[10]!='-' ){?>
        <tr>
            <td>Platelet Count</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[10]; ?>Lakhs/Cmm</td>
            <td>
                <?php echo $NRvalues[11]; ?> Lakhs/Cmm</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[11]!='-' ){?>
        <tr>
            <td>Reticulocyte Coun</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[11]; ?>%</td>
            <td>
                <?php echo $NRvalues[12]; ?> %</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[12]!='-' ){?>
        <tr>
            <td>Haematocrit ( PCV   )</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[12]; ?>%</td>
            <?php if($data[ 'gender']="male" ){?>
            <td>Male: 
                <?php echo $NRvalues[13]; ?>%</td>
            <?php }else{ ?>
            <td>Women: 
                <?php echo $NRvalues[14]; ?>%</td>
            <?php }?>

        </tr>
        <?php }?>

        <?php if($blood_exam[13]!='-' ){?>
        <tr>
            <td>Bleeding Time(Duke’s Method)</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[13]; ?>Min  Sec</td>
            <td>
                <?php echo $NRvalues[15]; ?> Minutes</td>
        </tr>
        <?php }?>


        <?php if($blood_exam[14]!='-' ){?>
        <tr>
            <td>Clotting Time (Capillary Method)</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[14]; ?>Min  Sec</td>
            <td>
                <?php echo $NRvalues[16]; ?> Minutes</td>
        </tr>
        <?php }?>
        <?php if($blood_exam[15]!='-' ){?>
        <tr>
            <td>MCV</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[15]; ?>Um3</td>
            <td>
                <?php echo $NRvalues[17]; ?> Um3</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[16]!='-' ){?>
        <tr>
            <td>MCH</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[16]; ?>Pg</td>
            <td>
                <?php echo $NRvalues[18]; ?> Pg</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[17]!='-' ){?>
        <tr>
            <td>MCHC</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[17]; ?>%</td>
            <td>
                <?php echo $NRvalues[19]; ?>%</td>
        </tr>
        <?php }?>

        <?php if($blood_exam[18]!='-' ){?>
        <tr>
            <td>Colour Index</td>
            <td>:</td>
            <td>
                <?php echo $blood_exam[18]; ?>
            </td>
            <td>
                <?php echo $NRvalues[20]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($blood_exam[19]!='-' ){?>
        <tr>
            <td>Smear for M.P</td>
            <td>:</td>
            <td colspan='2'>
                <?php echo $blood_exam[19]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($blood_exam[20]!='-' ){?>
        <tr>
            <td>Smear for M.F</td>
            <td>:</td>
            <td colspan='2'>
                <?php echo $blood_exam[20]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($blood_exam[21]!='-' ){?>
        <tr>
            <td>L.E. Cell Phenomenon</td>
            <td>:</td>
            <td colspan='2'>
                <?php echo $blood_exam[21]; ?>
            </td>

        </tr>
        <?php }?>

        <?php if($blood_exam[22]!='-' ){?>
        <tr>
            <td>Sickle Cell Test    </td>
            <td>:</td>
            <td colspan='2'>
                <?php echo $blood_exam[22]; ?>
            </td>
        </tr>
        <?php }?>
    <tr>
        <td colspan='4'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
    </table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>