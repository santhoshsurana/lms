<?php require_once( '../class/db.class.php'); $test_id=$_GET[ 'testId']; ?>


<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,99);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateCustom(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,99);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer();' class="btn"><i class='icon-print'></i>Print</button>
<select name="test_name" id="test_name" onChange="customTest(<?php echo $test_id;?>)" style="margin-top:12px;">
<option value='0' selected>-- Select Test --</option>
<option value='1'>Blood Examination Report</option>
<option value='2'>urine Examination Report</option>
<option value='3'>blood bank report</option>
<option value='4'>bio chemistry</option>
<option value='5'>serum electrolyte</option>
<option value='6'>serology</option>
<option value='7'>C.S.F analysis</option>
<option value='8'>semen analysis</option>
<option value='9'>stool Examination Report</option>
</select>
<div id="testDiv">
</div>
<div id="report_div">
    <?php 	$sql="SELECT `first_name`,`last_name`,`age`,`gender`,`reference`,`date` FROM `patients` WHERE `id`=( select `patient_name` from tests where `id`=" .$test_id. ")";
			$result=mysqli_query($CON, $sql);
			$data=mysqli_fetch_array($result);
			if($data[
				'gender']==1){ $data[ 'gender']="male" ;
			}elseif($data[ 'gender']==0){$data[ 'gender']="female" ;} $date=date( "d-m-Y", strtotime($data[ 'date']));
	?>

    <table class='table table-hover table-bordered'>
        <tr>
            <td>Sno</td>
            <td>:</td>
            <td>
                <?php echo $test_id;?>
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
            <td>
                Dr.<?php echo $data[ 'reference']; ?>
            </td>
            <td>Gender</td>
            <td>:</td>
            <td>
                <?php echo $data[ 'gender']; ?>
            </td>
        </tr>
    </table>


<?php /* blood examination */?>
 <?php 	$sql="SELECT * FROM `blood_examination` WHERE `id`=" .$test_id;
			$result=mysqli_query($CON, $sql);
			$blood_exam=mysqli_fetch_array($result);
			$length= (count($blood_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($blood_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$length=$length-2;
			for($i=3;$i<=$length;$i++){
				if($blood_exam[$i]!='-'){
					$flag2=1;
					$i=$length;
				}else{
					$flag2=0;
				}
			}
			$count=mysqli_num_rows($result);
				$sql = "SELECT `Normal_value` FROM `settings` WHERE `test_name`=0 ";
				$result=mysqli_query($CON, $sql);
				$NRvalues = Array();
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				$NRvalues[] =  $row['Normal_value'];  
			}
			if($count!=0 && $flag==1){ ?>
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

    </table>
    <?php }?>
<?php /* urine examination */?>
 <?php 	$sql = "SELECT * FROM `urine_examination` WHERE `id`=".$test_id;
			$result=mysqli_query($CON, $sql);
			$urine_exam = mysqli_fetch_array($result);
			$length= (count($urine_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($urine_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			for($i=1;$i<=5;$i++){
				if($urine_exam[$i]!='-'){
					$flag2=1;
					$i=5;
				}else{
					$flag2=0;
				}
			}
			for($i=6;$i<=10;$i++){
				if($urine_exam[$i]!='-'){
					$flag3=1;
					$i=10;
				}else{
					$flag3=0;
				}
			}
			for($i=11;$i<=$length;$i++){
				if($urine_exam[$i]!='-'){
					$flag4=1;
					$i=$length;
				}else{
					$flag4=0;
				}
			}
			$count=mysqli_num_rows($result);
			if($count!=0 && $flag==1){ ?>
 <table class='table table-hover table-bordered'>
  <tr>
    <td colspan="3"><div align='center'><u><h4>Urine Examination Report</h4></u></div></td>
    </tr>
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
            </tr>
   <?php if($flag2==1){?>     
    <tr>
    <td colspan="3"><strong><u>Chemical Examination :</u></strong></td>
    </tr>
    <?php }?>         
    <?php if($urine_exam[1]!='-' ){?>
    <tr>
    <td>Albumin</td>
    <td>:</td>
    <td ><?php echo $urine_exam[1]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[2]!='-' ){?>
    <tr>
    <td>Phosphates</td>
    <td>:</td>
    <td ><?php echo $urine_exam[2]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[3]!='-' ){?>
    <tr>
    <td>Sugar ( Fasting ) </td>
    <td>:</td>
    <td ><?php echo $urine_exam[3]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[4]!='-' ){?>
    <tr>
    <td>Sugar ( P.P )</td>
    <td>:</td>
    <td ><?php echo $urine_exam[4]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[5]!='-' ){?>
    <tr>
    <td>Sugar ( Random )  </td>
    <td>:</td>
    <td ><?php echo $urine_exam[5]; ?></td>
  </tr>
<?php }?>            
    <?php if($flag3==1){?>     
    <tr>
    <td colspan="3"><strong><u>Microscopic Examination :</u></strong></td>
    </tr>
    <?php }?>   
    <?php if($urine_exam[6]!='-' ){?>
    <tr>
    <td>W.B.C ( Puss Cells )  </td>
    <td>:</td>
    <td ><?php echo $urine_exam[6]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[7]!='-' ){?>
    <tr>
    <td>R.B.C</td>
    <td>:</td>
    <td ><?php echo $urine_exam[7]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[8]!='-' ){?>
    <tr>
    <td>Epithelial Cells </td>
    <td>:</td>
    <td ><?php echo $urine_exam[8]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[9]!='-' ){?>
    <tr>
    <td>CASTS</td>
    <td>:</td>
    <td ><?php echo $urine_exam[9]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[10]!='-' ){?>
    <tr>
    <td>CRYSTALS</td>
    <td>:</td>
    <td ><?php echo $urine_exam[10]; ?></td>
    </tr>
<?php }?>
    <?php if($flag4==1){?>        
    <tr>
    <td colspan="3"><strong><u>Physical Examination :</u></strong></td>
    </tr>
    <?php }?> 
         
    <?php if($urine_exam[11]!='-' ){?>
    <tr>
    <td>Colour</td>
    <td>:</td>
    <td ><?php echo $urine_exam[11]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[12]!='-' ){?>
    <tr>
    <td>Appearance</td>
    <td>:</td>
    <td ><?php echo $urine_exam[12]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[13]!='-' ){?>
    <tr>
    <td>Sediment</td>
    <td>:</td>
    <td><?php echo $urine_exam[13]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[14]!='-' ){?>
    <tr>
    <td>Ph ( Reaction )</td>
    <td>:</td>
    <td ><?php echo $urine_exam[14]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[15]!='-' ){?>
    <tr>
    <td>Specific Gravity</td>
    <td>:</td>
    <td ><?php echo $urine_exam[15]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[16]!='-' ){?>
    <tr>
    <td>Bile Salts </td>
    <td></td>
    <td ><?php echo $urine_exam[16]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[17]!='-' ){?>
    <tr>
    <td>Bile Pigments</td>
    <td>:</td>
    <td ><?php echo $urine_exam[17]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[18]!='-' ){?>
    <tr>
    <td>Urobilinogen</td>
    <td>:</td>
    <td ><?php echo $urine_exam[18]; ?></td>
    </tr>
<?php }?>
            
    <?php if($urine_exam[19]!='-' ){?>
    <tr>
    <td>KETONE</td>
    <td>:</td>
    <td ><?php echo $urine_exam[19]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[20]!='-' ){?>
    <tr>
    <td>NITRITE</td>
    <td>:</td>
    <td ><?php echo $urine_exam[20]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[21]!='-' ){?>
    <tr>
    <td>Ketone Bodies( Acetone )</td>
    <td>:</td>
    <td ><?php echo $urine_exam[21]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[22]!='-' ){?>
    <tr>
    <td>Chyle </td>
    <td></td>
    <td ><?php echo $urine_exam[22]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[23]!='-' ){?>
    <tr>
    <td>Bence Zence Protein</td>
    <td>:</td>
    <td ><p><?php echo $urine_exam[23]; ?></p></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[24]!='-' ){?>
    <tr>
    <td>Occult Blood</td>
    <td>:</td>
    <td ><?php echo $urine_exam[24]; ?></td>
  </tr>
<?php }?>
            
    <?php if($urine_exam[25]!='-' ){?>
     <tr>
    <td>Pregnancy Test </td>
    <td>:</td>
    <td ><?php echo $urine_exam[25]; ?></td>
  </tr>
<?php }?>
</table>
    <?php }?>
<?php /* blood bank */?>
 <?php 	$sql="SELECT * FROM `blood_bank` WHERE `id`=" .$test_id;
			$result=mysqli_query($CON, $sql);
			$bloodbank=mysqli_fetch_array($result);
			$length= (count($bloodbank)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($bloodbank[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$count=mysqli_num_rows($result);
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
        <tr>
            <td colspan='3'><u><h4 align='center'>Blood Bank Report</h4></u> 
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
        </tr>
        <?php if($bloodbank[1]!='-' ){?>
        <tr>
            <td>Blood Group</td>
            <td>:</td>
            <td>
                <?php echo $bloodbank[1]; ?>
            </td>
        </tr>
        <?php }?>

        <?php if($bloodbank[2]!='-' ){?>
        <tr>
            <td>Rh Typing</td>
            <td>:</td>
            <td>
                <?php echo $bloodbank[2]; ?>
            </td>
        </tr>
        <?php }?>

    </table>
    <?php }?>  
<?php /* bio chemistry */?>
 <?php 	$sql="SELECT * FROM `bio_chemistry` WHERE `id`=" .$test_id;
			$result=mysqli_query($CON, $sql);
			$biochem_test=mysqli_fetch_array($result);
			$length= (count($biochem_test)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($biochem_test[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$count=mysqli_num_rows($result);
			$sql="SELECT `Normal_value` FROM `settings` WHERE `test_name`=3 " ;
			$result=mysqli_query($CON, $sql);
			$NRvalues=array();
			while($row=mysqli_fetch_array($result, MYSQL_ASSOC)){ $NRvalues[]=$row[ 'Normal_value'];}
			if($count!=0 && $flag==1){ ?>
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
            <?php if($data[ 'gender']="male" ){?>
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
            <td>Fibrinogen</td>
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
    </table>
    <?php }?> 
<?php /* serum electrolyte */?>
  <?php 	$sql = "SELECT * FROM `serum_electrolyte` WHERE `id`=".$test_id;
			$result=mysqli_query($CON, $sql);
			$serum_exam = mysqli_fetch_array($result);
			$length= (count($serum_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($serum_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$count=mysqli_num_rows($result);
			$sql = "SELECT `Normal_value` FROM `settings` WHERE `test_name`=4 ";
			$result=mysqli_query($CON, $sql);
			$NRvalues = Array();
			while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$NRvalues[] =  $row['Normal_value']; }
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
  <tr>
    <td colspan='4'><div align='center'><u>
    <h4>Serum Electrolyte Report</h4></u></div></td>
    </tr>
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
                <th>Noraml range</th>
            </tr>
            
    <?php if($serum_exam[1]!='-' ){?>
  <tr>
    <td>Sodium ( Na+ )</td>
    <td>:</td>
    <td ><?php echo $serum_exam[1]; ?> mmol/L</td>
    <td><?php echo $NRvalues[0]; ?> mmol/L</td>
  </tr>
    <?php }?>
            
    <?php if($serum_exam[2]!='-' ){?>
  <tr>
    <td>Potassium ( K+ )</td>
    <td>:</td>
    <td ><?php echo $serum_exam[2]; ?> mmol/L</td>
    <td><?php echo $NRvalues[1]; ?> mmol/L</td>
    </tr>
    <?php }?>
            
    <?php if($serum_exam[3]!='-' ){?>
  <tr>
    <td>Chlorides</td>
    <td>:</td>
    <td ><?php echo $serum_exam[3]; ?> mmol/l</td>
    <td><?php echo $NRvalues[2]; ?> mmol/L</td>
    </tr>
    <?php }?>
            
    <?php if($serum_exam[4]!='-' ){?>
  <tr>
    <td>Calcium</td>
    <td>:</td>
    <td ><?php echo $serum_exam[4]; ?> mgs/dl</td>
    <td><?php echo $NRvalues[3]; ?>mmol/L</td>
    </tr>
    <?php }?>
</table>
    <?php }?>
<?php /* serology */?>
 <?php 	$sql = "SELECT * FROM `serology` WHERE `id`=".$test_id;
			$result=mysqli_query($CON, $sql);
			$serology_exam = mysqli_fetch_array($result);
			$length= (count($serology_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($serology_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			for($i=11;$i<=14;$i++){
				if($serology_exam[$i]!='-'){
				$flag2=1;
				$i=14;
				}else{
				$flag2=0;
				}
				}
			$count=mysqli_num_rows($result);
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
  <tr>
    <td colspan='3'><div align='center'><u><h4>Serology Report</h4></u></div></td>
    </tr>
 <tr>
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
            </tr>
       <tr>     
    <?php if($serology_exam[1]!='-' ){?>
    <td>VDRL</td>
    <td>:</td>
    <td ><?php echo $serology_exam[1]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[2]!='-' ){?>
  <tr>
    <td>T.P.H.A</td>
    <td>:</td>
    <td ><?php echo $serology_exam[2]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[3]!='-' ){?>
  <tr>
    <td>Hepatitis­B ( Hbs Ag )</td>
    <td>:</td>
    <td ><?php echo $serology_exam[3]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[4]!='-' ){?>
  <tr>
    <td>H.I.V</td>
    <td>:</td>
    <td ><?php echo $serology_exam[4]; ?></td>
    </tr>
    <?php }?>
  <tr>
    <td colspan='3'>This test is only a preliminary screening test for HIV infection. Any positive or negative report is to the confirmed by a different screening test or western blot test</td>
    </tr>            
  <tr>
    <td colspan='3'><u>NOTE :- Kits issued</u></td>
    </tr>            
    <?php if($serology_exam[5]!='-' ){?>
  <tr>
    <td>Hepatitis­C</td>
    <td>:</td>
    <td > <?php echo $serology_exam[5]; ?></td>
  </tr>
    <?php }?>
            
    <?php if($serology_exam[6]!='-' ){?>
  <tr>
    <td>R.A  Factor(Rheumatoid Arthritis)</td>
    <td>:</td>
    <td > <?php echo $serology_exam[6]; ?></td>
  </tr>
    <?php }?>
            
    <?php if($serology_exam[7]!='-' ){?>
  <tr>
    <td>A.S.O Test(Anti – Strptolysin – O)</td>
    <td>:</td>
    <td > <?php echo $serology_exam[7]; ?></td>
  </tr>
    <?php }?>
            
    <?php if($serology_exam[8]!='-' ){?>
  <tr>
    <td>C.R.P (C – Reactive Protein)</td>
    <td>:</td>
    <td > <?php echo $serology_exam[8]; ?></td>
  </tr>
    <?php }?>
            
    <?php if($serology_exam[9]!='-' ){?>
  <tr>
    <td>Mantoux Test</td>
    <td>:</td>
    <td > <?php echo $serology_exam[9]; ?></td>
  </tr>
    <?php }?>
            
    <?php if($serology_exam[10]!='-' ){?>
  <tr>
    <td>Sputum for AFB</td>
    <td>:</td>
    <td > <?php echo $serology_exam[10]; ?></td>
  </tr>
    <?php }?>
    <?php if($flag2==1 ){?>
  <tr>
    <td colspan="3"><strong><u>Widal:</u></strong></td>
  </tr>    
  <?php }?>  
    <?php if($serology_exam[11]!='-' ){?>
  <tr>
    <td>Salmonella Typhi “ O “</td>
    <td>:</td>
    <td ><?php echo $serology_exam[11]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[12]!='-' ){?>
  <tr>
    <td>Salmonella Typhi “ H “</td>
    <td>:</td>
    <td ><?php echo $serology_exam[12]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[13]!='-' ){?>
   <tr>
    <td>Salmonella Typhi “ AH “</td>
    <td>:</td>
    <td ><?php echo $serology_exam[13]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($serology_exam[14]!='-' ){?>
   <tr>
    <td>Salmonella Typhi “ BH “</td>
    <td>:</td>
    <td ><?php echo $serology_exam[14]; ?></td>
    </tr>
    <?php }?>

</table>
    <?php }?>
<?php /* CSF analysis */?> 
 <?php 	$sql = "SELECT * FROM `csf_analysis` WHERE `id`=".$test_id;
				$result=mysqli_query($CON, $sql);
				$csf_exam = mysqli_fetch_array($result);
				$count=mysqli_num_rows($result);
				$length= (count($csf_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($csf_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
  <tr>
    <td colspan='3'><div align='center'><u><h4>C.S.F analysis Report</h4></u></div></td>
    </tr>
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
            </tr>            
  <?php if($csf_exam[1]!='-' ){?>
  <tr>
    <td>Cell Count</td>
    <td>:</td>
    <td ><?php echo $csf_exam[1]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[2]!='-' ){?>
  <tr>
    <td>Type of Cells </td>
    <td>:</td>
    <td ><?php echo $csf_exam[2]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[3]!='-' ){?>
  <tr>
    <td>Pandy’s Test </td>
    <td>:</td>
    <td ><?php echo $csf_exam[3]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[4]!='-' ){?>
  <tr>
    <td>Globulin  </td>
    <td>:</td>
    <td ><?php echo $csf_exam[4]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[5]!='-' ){?>
  <tr>
    <td>Total Protein </td>
    <td>:</td>
    <td ><?php echo $csf_exam[5]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[6]!='-' ){?>
  <tr>
    <td>Sugar</td>
    <td>:</td>
    <td ><?php echo $csf_exam[6]; ?></td>
    </tr>
    <?php }?>
            
    <?php if($csf_exam[7]!='-' ){?>
  <tr>
    <td>Chlorides </td>
    <td>:</td>
    <td ><?php echo $csf_exam[7]; ?></td>
    </tr>
    <?php }?>
</table>
    <?php }?>
<?php /* semen analysis */?>
    <?php 	$sql = "SELECT * FROM `semen_analysis` WHERE `id`=".$test_id;
			$result=mysqli_query($CON, $sql);
			$semen_exam = mysqli_fetch_array($result);
			$length= (count($semen_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($semen_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$count=mysqli_num_rows($result);
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
   <tr>
    <td colspan='3'><div align='center'><u>
      <h4>Semen Analysis Report</h4></u></div></td>
  </tr> 
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
            </tr>
           
  <?php if($semen_exam[1]!='-' ){?>
  <tr>
    <td>Volume </td>
    <td>:</td>
    <td ><?php echo $semen_exam[1]; ?></td>
    </tr>
 <?php }?>
            
 <?php if($semen_exam[2]!='-' ){?>
  <tr>
    <td>Reaction ( Ph ) </td>
    <td>:</td>
    <td ><?php echo $semen_exam[2]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($semen_exam[3]!='-' ){?>
  <tr>
    <td>Viscosity</td>
    <td>:</td>
    <td ><?php echo $semen_exam[3]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($semen_exam[4]!='-' ){?>
  <tr>
    <td>Count </td>
    <td>:</td>
    <td ><?php echo $semen_exam[4]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($semen_exam[5]!='-' ){?>
  <tr>
    <td>Colour </td>
    <td>:</td>
    <td ><?php echo $semen_exam[5]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($semen_exam[6]!='-' ){?>
  <tr>
    <td>Puss Cells </td>
    <td>:</td>
    <td ><?php echo $semen_exam[6]; ?></td>
    </tr>
 <?php }?>

</table>
    <?php }?>
<?php /* stool examination */?>
   <?php 	$sql = "SELECT * FROM `stool_examination` WHERE `id`=".$test_id ;
			$result=mysqli_query($CON, $sql);
			$stool_exam = mysqli_fetch_array($result);
			$length= (count($stool_exam)/2)-1;
			for($i=1;$i<=$length;$i++){
				if($stool_exam[$i]!='-'){
					$flag=1;
					$i=$length;
				}else{
					$flag=0;
				}
			}
			$count=mysqli_num_rows($result);
			if($count!=0 && $flag==1){ ?>
    <table class='table table-hover table-bordered'>
 <tr>
    <td colspan='3'><div align='center'><u><h4>Stool Examination Report</h4></u></div></td>
    </tr>
     <tr>
                <th >Chemical name</th>
                <th>&nbsp;</th>
                <th>Contamination</th>
            </tr>
            
    <?php if($stool_exam[1]!='-' ){?>
 <tr>
    <td>Colour</td>
    <td>:</td>
    <td ><?php echo $stool_exam[1]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[2]!='-' ){?>
  <tr>
    <td>Consistency</td>
    <td>:</td>
    <td ><?php echo $stool_exam[2]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[3]!='-' ){?>
  <tr>
    <td>Mucous </td>
    <td>:</td>
    <td ><?php echo $stool_exam[3]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[4]!='-' ){?>
  <tr>
    <td>Ph ( Reaction )  </td>
    <td>:</td>
    <td ><?php echo $stool_exam[4]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[5]!='-' ){?>
  <tr>
    <td>Reducing Substances</td>
    <td>:</td>
    <td ><?php echo $stool_exam[5]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[6]!='-' ){?>
  <tr>
    <td>Occult Blood</td>
    <td>:</td>
    <td ><?php echo $stool_exam[6]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[7]!='-' ){?>
  <tr>
    <td>OVA </td>
    <td>:</td>
    <td ><?php echo $stool_exam[7]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[8]!='-' ){?>
  <tr>
    <td>CYSTS</td>
    <td>:</td>
    <td ><?php echo $stool_exam[8]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[9]!='-' ){?>
  <tr>
    <td>Puss Cells</td>
    <td>:</td>
    <td ><?php echo $stool_exam[9]; ?></td>
    </tr>
 <?php }?>
            
    <?php if($stool_exam[10]!='-' ){?>
  <tr>
    <td>R.B.C </td>
    <td>:</td>
    <td ><?php echo $stool_exam[10]; ?></td>
    </tr>
 <?php }?>

</table>
    <?php }?>
<table class='table table-hover table-bordered'>
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
    </table>
        <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>
