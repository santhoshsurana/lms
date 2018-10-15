<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `stool_examination` WHERE `id`=".$test_id ;
$result=mysqli_query($CON, $sql);
$stool_exam = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,9);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateStoolexam(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,9);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Stool Examination test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Colour'>Colour</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='colour' required value='<?php echo $stool_exam[1]; ?>' name='Colour' placeholder='enter Colour' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Consistency'>Consistency</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='consistency' required value='<?php echo $stool_exam[2]; ?>' name='Consistency' placeholder='enter Consistency' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Mucous'>Mucous </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='mucous' required value='<?php echo $stool_exam[3]; ?>' name='Mucous' placeholder='enter Mucous' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Ph ( Reaction ) '>Ph ( Reaction )  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='Ph_reaction' required value='<?php echo $stool_exam[4]; ?>' name='Ph ( Reaction ) ' placeholder='enter Ph ( Reaction ) ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Reducing Substances'>Reducing Substances</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='reducing_substances' required value='<?php echo $stool_exam[5]; ?>' name='Reducing Substances' placeholder='enter Reducing Substances' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Occult Blood'>Occult Blood </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='occult_blood' required value='<?php echo $stool_exam[6]; ?>' name='Occult Blood' placeholder='enter Occult Blood' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='OVA'>OVA </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='OVA' required value='<?php echo $stool_exam[7]; ?>' name='OVA' placeholder='enter OVA' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='CYSTS'>CYSTS </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='CYSTS' required value='<?php echo $stool_exam[8]; ?>' name='CYSTS' placeholder='enter CYSTS' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Puss Cells'>Puss Cells</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='puss_cells' required value='<?php echo $stool_exam[9]; ?>' name='Puss Cells' placeholder='enter Puss Cells' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='R.B.C'>R.B.C  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='RBC' required value='<?php echo $stool_exam[10]; ?>' name='R.B.C' placeholder='enter R.B.C' />
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
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>