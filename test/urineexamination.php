<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `urine_examination` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$urine_exam = mysqli_fetch_array($result);
$length= (count($urine_exam)/2)-1;
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
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,2);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateUrineexam(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,2);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Urine Examination test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Albumin'>Albumin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='albumin' required value='<?php echo $urine_exam[1]; ?>' name='Albumin' placeholder='enter Albumin' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Phosphates'>Phosphates</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='phosphates' required value='<?php echo $urine_exam[2]; ?>' name='Phosphates' placeholder='enter Phosphates' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sugar ( Fasting )'>Sugar ( Fasting ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_fasting' required value='<?php echo $urine_exam[3]; ?>' name='Sugar ( Fasting )' placeholder='enter Sugar ( Fasting )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sugar ( P.P )'>Sugar ( P.P ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_PP' required value='<?php echo $urine_exam[4]; ?>' name='Sugar ( P.P )' placeholder='enter Sugar ( P.P )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sugar ( Random )'>Sugar ( Random )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar_random' required value='<?php echo $urine_exam[5]; ?>' name='Sugar ( Random )' placeholder='enter Sugar ( Random )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='W.B.C ( Puss Cells )'>W.B.C ( Puss Cells )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='WBC_puss_cells' required value='<?php echo $urine_exam[6]; ?>' name='W.B.C ( Puss Cells )' placeholder='enter W.B.C ( Puss Cells )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='R.B.C'>R.B.C</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='RBC' required value='<?php echo $urine_exam[7]; ?>' name='R.B.C' placeholder='enter R.B.C' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Epithelial Cells'>Epithelial Cells</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='epithelial_cells' required value='<?php echo $urine_exam[8]; ?>' name='Epithelial Cells' placeholder='enter Epithelial Cells' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='CASTS'>CASTS </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='CASTS' required value='<?php echo $urine_exam[9]; ?>' name='CASTS' placeholder='enter CASTS' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='CRYSTALS'>CRYSTALS</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='CRYSTALS' required value='<?php echo $urine_exam[10]; ?>' name='CRYSTALS' placeholder='enter CRYSTALS' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Colour'>Colour</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='colour' required value='<?php echo $urine_exam[11]; ?>' name='Colour' placeholder='enter Colour' />
            </div>
        </div>

        <div class='control-group'>
            <label class='control-label' for='Appearance'>Appearance</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='appearance' required value='<?php echo $urine_exam[12]; ?>' name='Appearance' placeholder='enter Appearance' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sediment'>Sediment</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sediment' required value='<?php echo $urine_exam[13]; ?>' name='Sediment' placeholder='enter Sediment' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Ph ( Reaction )'>Ph ( Reaction ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ph_reaction' required value='<?php echo $urine_exam[14]; ?>' name='Ph ( Reaction )' placeholder='enter Ph ( Reaction )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Specific Gravity'>Specific Gravity</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='specific_gravity' required value='<?php echo $urine_exam[15]; ?>' name='Specific Gravity' placeholder='enter Specific Gravity' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Bile Salts'>Bile Salts </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='bile_salts' required value='<?php echo $urine_exam[16]; ?>' name='Bile Salts' placeholder='enter Bile Salts' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Bile Pigments'>Bile Pigments</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='bile_pigments' required value='<?php echo $urine_exam[17]; ?>' name='Bile Pigments' placeholder='enter Bile Pigments' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Urobilinogen'>Urobilinogen</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='urobilinogen' required value='<?php echo $urine_exam[18]; ?>' name='Urobilinogen' placeholder='enter Urobilinogen' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='KETONE'>KETONE</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='KETONE' required value='<?php echo $urine_exam[19]; ?>' name='KETONE' placeholder='enter KETONE' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='NITRITE'>NITRITE</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='NITRITE' required value='<?php echo $urine_exam[20]; ?>' name='NITRITE' placeholder='enter NITRITE' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Ketone Bodies( Acetone )'>Ketone Bodies( Acetone ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ketone_bodies_acetone' required value='<?php echo $urine_exam[21]; ?>' name='Ketone Bodies( Acetone )' placeholder='enter Ketone Bodies( Acetone )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Chyle'>Chyle </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='chyle' required value='<?php echo $urine_exam[22]; ?>' name='Chyle' placeholder='enter Chyle' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Bence Zence Protein'>Bence Zence Protein</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='bence_zence_protein' required value='<?php echo $urine_exam[23]; ?>' name='Bence Zence Protein' placeholder='enter Bence Zence Protein' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Occult Blood'>Occult Blood</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='occult_blood' required value='<?php echo $urine_exam[24]; ?>' name='Occult Blood' placeholder='enter Occult Blood' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Pregnancy Test'>Pregnancy Test </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='pregnancy_test' required value='<?php echo $urine_exam[25]; ?>' name='Pregnancy Test' placeholder='enter Pregnancy Test' />
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
?>
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
    <tr>
        <td colspan='3'>
             <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>