<!-- start of Create test tab  -->
<button onClick="display('class/viewpatient.class.php?p=0');" class="btn"><i class="icon-circle-arrow-left"></i>back</button>
             <form class='form-horizontal'>
             <div class='control-group'>
                	<label class='control-label' for='test_type'>Test Type</label>
                    <div class='controls'>
                    <select name='test_type' id='test_type' onClick='showTest()'>
                    <option value='0' >Medcis</option>
                    <option value='1' >Lab test</option> 
                    </select>
                    </div>
  				</div>
                <div id='showTest'>
             <div class='control-group'>
                	<label class='control-label' for='test_name'>Test name</label>
                    <div class='controls'>
                    <select name='test_name' id='test_name'>
                        <option value='0' selected>-- Select Test --</option>
                        <option value='1'>Blood Examination Report</option>
                        <option value='2'>Urine Examination Report</option>
                        <option value='3'>Blood bank report</option>
                        <option value='4'>Bio chemistry</option>
                        <option value='5'>Serum electrolyte</option>
                        <option value='6'>Serology</option>
                        <option value='7'>C.S.F analysis</option>
                        <option value='8'>Semen analysis</option>
                        <option value='9'>Stool Examination Report</option>
                        <option value='10'>A.D.A levels Report</option>
                        <option value='11'>Cholinesterase Report</option>
                        <option value='12'>Plasma fibrinogen Report</option>
                        <option value='13'>Glucose  tolerance Report</option>
                        <option value='99'>Custom Test</option>
                    </select>
                    </div>
  				</div>
                </div>
               <div class='control-group'>
              	<label class='control-label' for='patient_id'>Patient Id</label>
                    <div class='controls'>
                    <input type='text' id='patient_id' required name='patient_id' onBlur='patientIdChk();' maxlength="20" placeholder='enter patient Id' onKeyPress="charChk(event,'num');"/>
                    </div>
  				</div>	
                <div class='control-group'>
                <label class='control-label' for='total_amount'>Total amount</label>
                	<div class='controls'>
                	<input type='text' id='total_amount' required name='total_amount' maxlength="6" placeholder='enter total amount' onKeyPress="charChk(event,'num');"/>
                    </div>
  				</div>
                <div class='control-group'>
                <label class='control-label' for='paid_amount'>Paid amount</label>
                	<div class='controls'>
                	<input type='text' id='paid_amount' required name='paid_amount' maxlength="6" placeholder='enter amount paid' onKeyPress="charChk(event,'num');"/>
                    </div>
  				</div>
                
                <div class='control-group'>
                    <div class='controls'>
                      <input class='btn' type='button' value='submit' onClick='createTest()'>
                    </div>
                  </div>
              </form>
          <!-- end of Create test tab  -->