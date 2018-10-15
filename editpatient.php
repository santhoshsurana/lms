 <?php require_once("class/db.class.php");
 	$patientId=$_GET['patientId'];
	$sql = "SELECT * FROM `patients` WHERE `id`=$patientId";
	$result=mysqli_query($CON, $sql);
	$data=mysqli_fetch_array($result);
?>
<!-- start of Edit patient tab  -->
          <button onClick="display('class/viewpatient.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
             <form class='form-horizontal'>
             <div class='control-group'>
              	<label class='control-label' for='first_name'>First name</label>
                <div class='controls'>
                <input type='text' required name='first_name' id='firstname' placeholder='enter first name' value='<?php echo $data['first_name']; ?>' onKeyPress="charChk(event,'name');"/>
                </div>
              </div>
             <div class='control-group'>
                <label class='control-label' for='last_name'>Last name</label>
                <div class='controls'>
                <input type='text' required name='last_name' id='lastname' placeholder='enter last name' value='<?php echo $data['last_name']; ?>' onKeyPress="charChk(event,'alpha');"/>
                </div>
              </div>
             <div class='control-group'>
              	<label class='control-label' for='gender'>Gender</label>
                <div class='controls'>
                <label class="pull-left" for="genderM"><input type="radio" name="gender" id="genderM" value="1" <?php if($data['gender']==1){echo 'checked';} ?>/> Male</label>
                <label class="pull-left" for="genderF"><input type="radio" name="gender" id="genderF" value="0" <?php if($data['gender']==0){echo 'checked';} ?>/> Female</label>
                <input type="hidden" value="<?php echo $data['gender']; ?>" name='gender_val' id='gender_val'>
                </div>
             </div>
             <div class='control-group'>
                <label class='control-label' for='age'>Age</label>
                <div class='controls'>
                <input type='text' name='age' id='age' placeholder='age' maxlength="2" value='<?php echo $data['age']; ?>' onKeyPress="charChk(event,'num');"/>
                </div>
             </div>
             <div class='control-group'>
                <label class='control-label' for='phone'>Phone number</label>
                <div class='controls'>
                <input type='tel' name='phone' id='phone' placeholder='enter phone number' maxlength="10" value='<?php echo $data['phone']; ?>' onKeyPress="charChk(event,'num');"/>
                </div>
              </div>
              <div class='control-group'>
                <label class='control-label' for='ref'>Ref. Doctor</label>
                <div class='controls'>
                <input type='text' name='ref' id='ref' placeholder='enter Ref doctor' value='<?php echo $data['reference']; ?>' onKeyPress="charChk(event,'name');"/>
                </div>
              </div>
               <div class='control-group'>
                    <div class='controls'>
                      <input type='button' class='btn' onClick='updatePatient(<?php echo $patientId; ?>)' value='Submit'>
                    </div>
                  </div>
              </form>
          <!-- end of Edit patient tab  -->