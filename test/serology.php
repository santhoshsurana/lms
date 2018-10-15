<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `serology` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$serology_exam = mysqli_fetch_array($result);
for($i=11;$i<=14;$i++){
				if($serology_exam[$i]!='-'){
				$flag2=1;
				$i=14;
				}else{
				$flag2=0;
				}
				}
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,6);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateSerology(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,6);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Serology test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='VDRL'>VDRL </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='VDRL' required value='<?php echo $serology_exam[1]; ?>' name='VDRL' placeholder='VDRL' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='T.P.H.A '>T.P.H.A </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='TPHA' required value='<?php echo $serology_exam[2]; ?>' name='T.P.H.A ' placeholder='enter T.P.H.A ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Hepatitis­B ( Hbs Ag ) '>Hepatitis­B ( Hbs Ag ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='hepatitisB_hbs_Ag' required value='<?php echo $serology_exam[3]; ?>' name='Hepatitis­B ( Hbs Ag ) ' placeholder='enter Hepatitis­B ( Hbs Ag ) ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='H.I.V '>H.I.V   </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='HIV' required value='<?php echo $serology_exam[4]; ?>' name='H.I.V ' placeholder='enter H.I.V ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Hepatitis­C'>Hepatitis­C</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='hepatitisC' required value='<?php echo $serology_exam[5]; ?>' name='Hepatitis­C' placeholder='enter Hepatitis­C' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='R.A  Factor   ( Rheumatoid Arthritis )'>R.A  Factor   ( Rheumatoid Arthritis )  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ra_factor' required value='<?php echo $serology_exam[6]; ?>' name='R.A  Factor' placeholder='enter R.A  Factor' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='A.S.O Test    ( Anti – Strptolysin – O )  '>A.S.O Test    ( Anti – Strptolysin – O )   </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='ASO_test' required value='<?php echo $serology_exam[7]; ?>' name='A.S.O Test    ( Anti – Strptolysin – O )  ' placeholder='enter username' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='C.R.P( C – Reactive Protein ) '>C.R.P( C – Reactive Protein )   </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='CRP' required value='<?php echo $serology_exam[8]; ?>' name='C.R.P( C – Reactive Protein ) ' placeholder='enter C.R.P( C – Reactive Protein ) ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Mantoux Test'>Mantoux Test</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='mantoux_test' required value='<?php echo $serology_exam[9]; ?>' name='Mantoux Test' placeholder='enter Mantoux Test' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sputum for AFB'>Sputum for AFB</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sputum_for_AFB' required value='<?php echo $serology_exam[10]; ?>' name='Sputum for AFB' placeholder='enter Sputum for AFB' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Salmonella Typhi “ O “'>Salmonella Typhi “ O “</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='salmonella_typhi_o' required value='<?php echo $serology_exam[11]; ?>' name='Salmonella Typhi “ O “' placeholder='enter Salmonella Typhi “ O “' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Salmonella Typhi “ H “'>Salmonella Typhi “ H “</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='salmonella_typhi_H' required value='<?php echo $serology_exam[12]; ?>' name='Salmonella Typhi “ H “' placeholder='enter Salmonella Typhi “ H “' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='salmonella_typhi_AH'>Salmonella Typhi “ AH “</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='salmonella_typhi_AH' required value='<?php echo $serology_exam[13]; ?>' name='salmonella_typhi_AH' placeholder='enter Salmonella Typhi “ AH “' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Salmonella Typhi “ BH “'>Salmonella Typhi “ BH “</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='salmonella_typhi_BH' required value='<?php echo $serology_exam[14]; ?>' name='Salmonella Typhi “ BH “' placeholder='enter Salmonella Typhi “ BH “' />
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
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>