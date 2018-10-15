 <?php require_once("class/db.class.php");
 	$testId=$_GET['testId'];
	$sql = "SELECT * FROM `tests` WHERE `id`=$testId ";
	$result=mysqli_query($CON, $sql);
	$data=mysqli_fetch_array($result);
	$tests=array('medcis test','Blood Examination Report','urine Examination Report','blood bank report','bio chemistry','serum electrolyte','serology','C.S.F analysis','semen analysis','stool Examination Report','A.D.A levels Report', 'Cholinesterase Report', 'Plasma fibrinogen Report', 'Glucose  tolerance Report');
$tests[99]='custom test';
	?>
	<!-- start of Edit test tab  -->
    <button onClick="display('class/<?php if($data['test_type']==0){echo "viewmedics";}else{echo "viewtest";} ?>.class.php?p=0');" class="btn" ><i class="icon-circle-arrow-left"></i>back</button>
             <form class='form-horizontal'>
             <div class='control-group'>
                	<label class='control-label' for='test_type'>Test Type</label>
                    <div class='controls'>
                    <input type='text' value='<?php if($data['test_type']==0){echo "Medics";}else{echo "Lab test";} ?>' readonly />
					<input type='hidden' name='test_type' id='test_type' value='<?php echo $data['test_type'];?>' readonly />
                    </div>
  				</div>
			<div class='control-group'>
                	<label class='control-label' for='test_type'>Test Name</label>
                    <div class='controls'>
                    <input type='text' value="<?php echo $tests[$data['test_name']];?>" readonly />
                    </div>
  				</div>
            <div class='control-group'>
              	<label class='control-label' for='patient_id'>Patient Id</label>
                    <div class='controls'>
                    <input type='text' id='patient_id' required name='patient_id'  value='<?php echo $data['patient_name']; ?>' readonly placeholder='enter patient Id' />
                    </div>
  				</div>	
                <div class='control-group'>
                <label class='control-label' for='total_amount'>total amount</label>
                	<div class='controls'>
                	<input type='text' id='total_amount' required name='total_amount' value='<?php echo $data['total_amount']; ?>' onKeyPress="charChk(event,'num');" placeholder='enter total amount'/>
                    </div>
  				</div>
                <div class='control-group'>
                <label class='control-label' for='paid_amount'>paid amount</label>
                	<div class='controls'>
                	<input type='text' id='paid_amount' required name='paid_amount' value='<?php echo $data['paid_amount']; ?>' onKeyPress="charChk(event,'num');" placeholder='enter amount paid'/>
                    </div>
  				</div>
                
                <div class='control-group'>
                    <div class='controls'>
                      <input class='btn' type='button' value='submit' onClick='updateTest(<?php echo $testId;?>)'>
                    </div>
                  </div>
              </form>
          <!-- end of Edit test tab  -->