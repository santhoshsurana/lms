<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM  `ada_levels`  WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$adalevel = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,10);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateAdalevel(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,10);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>A.D.A levels Report</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='nature_specimen'>Nature of specimen</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='nature_specimen' required value='<?php echo $adalevel[1]; ?>' name='nature_specimen' placeholder='enter nature specimen' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='result'>Result</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='result' required value='<?php echo $adalevel[2]; ?>' name='result' placeholder='enter result' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='normal'>Normal</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='normal' required value='<?php echo $adalevel[3]; ?>' name='normal' placeholder='enter normal' />
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
            <td colspan='3'><u><h4 align='center'>Adenosine Deaminase Activity Report</h4></u> 
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
        </tr>
        <?php if($adalevel[1]!='-' ){?>
        <tr>
            <td>Nature of specimen</td>
            <td>:</td>
            <td>
                <?php echo $adalevel[1]; ?>
            </td>
        </tr>
        <?php }?>
        <?php if($adalevel[2]!='-' ){?>
        <tr>
            <td>result	</td>
            <td>:</td>
            <td>
                <?php echo $adalevel[2]; ?> U/L
            </td>
        </tr>
        <?php }?>
                <tr>
            <td colspan='3'><u><h4 align='center'>A.D.A Interpretation</h4></u> 
            </td>
        </tr>
        <?php if($adalevel[3]!='-' ){?>
        <tr>
            <td>normal	</td>
            <td>:</td>
            <td>
                <?php echo $adalevel[3]; ?> U/L
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