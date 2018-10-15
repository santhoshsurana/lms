<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `serum_electrolyte` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$serum_exam = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,5);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateSerumElectro(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,5);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Serum Electrolyte test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='Sodium ( Na+ )'>Sodium ( Na+ )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='sodium_Na' required value='<?php echo $serum_exam[1]; ?>' name='Sodium ( Na+ )' placeholder='enter Sodium ( Na+ )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Potassium ( K+ )'>Potassium ( K+ )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='potassium_K' required value='<?php echo $serum_exam[2]; ?>' name='Potassium ( K+ )' placeholder='enter Potassium ( K+ )' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Chlorides'>Chlorides</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='chlorides' required value='<?php echo $serum_exam[3]; ?>' name='Chlorides' placeholder='enter Chlorides' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='Calcium'>Calcium</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='calcium' required value='<?php echo $serum_exam[4]; ?>' name='Calcium' placeholder='enter Calcium' />
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
$sql = "SELECT `Normal_value` FROM `settings` WHERE `test_name`=4 ";
$result=mysqli_query($CON, $sql);
$NRvalues = Array();
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
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
    <tr>
        <td colspan='4'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>