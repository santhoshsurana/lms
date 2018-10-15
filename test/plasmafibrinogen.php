<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `plasma_fibrinogen` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$plasma = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,12);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updatePlasmafib(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,12);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Blood group test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='plasma_fibrinogen'>plasma fibrinogen result</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='plasma_fibrinogen' required value='<?php echo $plasma[1]; ?>' name='plasma_fibrinogen' placeholder='enter plasma fibrinogen' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='normal'>normal range</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='normal' required value='<?php echo $plasma[2]; ?>' name='normal' placeholder='enter normal' />
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
            <td colspan='3'><u><h4 align='center'>Plasma fibrinogen Report</h4></u> 
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
        </tr>
        <?php if($plasma[1]!='-' ){?>
        <tr>
            <td>plasma fibrinogen result</td>
            <td>:</td>
            <td>
                <?php echo $plasma[1]; ?> mgs %
            </td>
        </tr>
        <?php }?>

        <?php if($plasma[2]!='-' ){?>
        <tr>
            <td>normal range</td>
            <td>:</td>
            <td>
                <?php echo $plasma[2]; ?> mgs/dl
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