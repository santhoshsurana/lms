<?php require_once('../class/db.class.php');
$test_id=$_GET['testId'];
$sql = "SELECT * FROM `cholinesterase` WHERE `id`=".$test_id;
$result=mysqli_query($CON, $sql);
$cholinesterase = mysqli_fetch_array($result);
?>
<button onClick="display('class/viewtest.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="editReport(<?php echo $test_id;?>,11);" class="btn"><i class="icon-refresh"></i>Reload</button>
<button type="button" onClick='updateCholinesterase(<?php echo $test_id; ?>);editReport(<?php echo $test_id;?>,11);' class="btn"><i class="icon-ok"></i>save</button>
<button onClick='printer()' class="btn"><i class='icon-print'></i>Print</button>
<h3>Blood group test</h3>
<div  id="test_div">
<form class='form-horizontal'>
        <div class='control-group'>
            <label class='control-label' for='cholinesterase_result'>cholinesterase result ( New DGKC method )</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='cholinesterase_result' required value='<?php echo $cholinesterase[1]; ?>' name='cholinesterase_result' placeholder='enter cholinesterase_result' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='female'>females</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='female' required value='<?php echo $cholinesterase[2]; ?>' name='female' placeholder='enter female' />
            </div>
        </div>
        <div class='control-group'>
            <label class='control-label' for='male'>males</label>
            <div class='controls'>
                <input type='text' onKeyPress="charChk(event,'nr');" id='male' required value='<?php echo $cholinesterase[3]; ?>' name='male' placeholder='enter male' />
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
            <td colspan='3'><u><h4 align='center'>Cholinesterase Report</h4></u> 
            </td>
        </tr>
        <tr>
            <th>Chemical name</th>
            <th>&nbsp;</th>
            <th>Contamination</th>
        </tr>
        <?php if($cholinesterase[1]!='-' ){?>
        <tr>
            <td>Cholinesterase result ( new dgkc method )</td>
            <td>:</td>
            <td>
                <?php echo $cholinesterase[1]; ?> C.S.F
			<h5>EXPECTED VALUE</h5>
        <?php if($data[ 'gender']="male" ){?>
        Male:<?php echo $cholinesterase[3];?> U/L
        
        <?php }else{ ?>
        Female:<?php echo $cholinesterase[2];?> U/L
        <?php }
		 }?>
         </td>
         </tr>
    <tr>
        <td colspan='3'>
            <br/><br/><div align='right'>Signature</div>
        </td>
    </tr>
</table>
    <p style="float:left;">This report generated in Lab management system v1.1 on <?php echo date('d/m/Y');?></p>
    <p style="float:right;">www.lms.azul.in</p>
</div>