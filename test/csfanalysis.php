<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `csf_analysis` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$csf_exam = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,7);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateCSFanalysis(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,7);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>CSF Analysis test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Cell Count'>Cell Count  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='cell_cunt' required value='<?php echo $csf_exam[1]; ?>' name='Cell Count' placeholder='enter Cell Count' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Type of Cells'>Type of Cells </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='type_of_cells' required value='<?php echo $csf_exam[2]; ?>' name='Type of Cells' placeholder='enter Type of Cells' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Pandy’s Test'>Pandy’s Test </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='pandy_test' required value='<?php echo $csf_exam[3]; ?>' name='Pandy’s Test' placeholder='enter Pandy’s Test' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Globulin'>Globulin</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='globulin' required value='<?php echo $csf_exam[4]; ?>' name='Globulin' placeholder='enter Globulin      ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Total Protein'>Total Protein </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='total_protein' required value='<?php echo $csf_exam[5]; ?>' name='Total Protein' placeholder='enter Total Protein' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Sugar '>Sugar    </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sugar' required value='<?php echo $csf_exam[6]; ?>' name='Sugar' placeholder='enter Sugar ' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Chlorides '>Chlorides  </label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='chlorides' required value='<?php echo $csf_exam[7]; ?>' name='Chlorides' placeholder='enter Chlorides ' />
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
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>