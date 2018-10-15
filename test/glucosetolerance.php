<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `glucose_tolerance` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$glucose = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,13);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateGlucosetol(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,13);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Blood group test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='fasting_glucose'>fasting glucose</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='fasting_glucose' required value='<?php echo $glucose[1]; ?>' name='fasting_glucose' placeholder='enter Blood Group' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='hour1'>1<sup>st</sup> hour</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='hour1' required value='<?php echo $glucose[2]; ?>' name='hour1' placeholder='enter 1st hour' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='hour2'>2<sup>nd</sup> hour</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='hour2' required value='<?php echo $glucose[3]; ?>' name='hour2' placeholder='enter 2nd hour' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='hour3'>2 <sup>1/2</sup> hour</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='hour3' required value='<?php echo $glucose[4]; ?>' name='hour3' placeholder='enter 2 1/2 hour' />
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
            <td colspan='3'><h4 align='center'><u>Glucose  tolerance Report</u></h4> 
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
        </tr>
        <?php if($glucose[1]!='-' ){?>
        <tr>
            <td>fasting glucose</td>
            <td>:</td>
            <td>
                <?php echo $glucose[1]; ?> mg/dl
            </td>
        </tr>
        <?php }?>

        <?php if($glucose[2]!='-' ){?>
        <tr>
            <td>1<sup>st</sup> hour</td>
            <td>:</td>
            <td>
                <?php echo $glucose[2]; ?> mg/dl
            </td>
        </tr>
        <?php }?>
        <?php if($glucose[3]!='-' ){?>
        <tr>
            <td>2<sup>nd</sup> hour</td>
            <td>:</td>
            <td>
                <?php echo $glucose[3]; ?> mg/dl
            </td>
        </tr>
        <?php }?>
        <?php if($glucose[4]!='-' ){?>
        <tr>
            <td>2 <sup>1/2</sup> hour</td>
            <td>:</td>
            <td>
                <?php echo $glucose[4]; ?> mg/dl
            </td>
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