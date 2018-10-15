<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `semen_analysis` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$semen_exam = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,8);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateSemenAnalysis(<?php  echo $test_id; ?>);editReport(<?php echo $test_id;?>,8);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Semen Analysis test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Volume'>Volume </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='volume' required value='<?php  echo $semen_exam[1]; ?>' name='Volume' placeholder='enter Volume' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Reaction ( Ph )'>Reaction ( Ph ) </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='reaction_Ph' required value='<?php  echo $semen_exam[2]; ?>' name='Reaction ( Ph )' placeholder='enter Reaction ( Ph )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Viscosity'>Viscosity </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='viscosity' required value='<?php  echo $semen_exam[3]; ?>' name='Viscosity' placeholder='enter Viscosity' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Count'>Count </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='count' required value='<?php  echo $semen_exam[4]; ?>' name='Count' placeholder='enter Count' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Colour'>Colour   </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='colour' required value='<?php  echo $semen_exam[5]; ?>' name='Colour' placeholder='enter Colour' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Puss Cells '>Puss Cells</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='puss_cells' required value='<?php  echo $semen_exam[6]; ?>' name='Puss Cells ' placeholder='enter Puss Cells ' />
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
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>