          <!-- start of Create patient tab  -->
             <form class="form-horizontal">
             <div class="control-group">
              	<label class="control-label" for="first_name">First name</label>
                <div class="controls">
                <input type="text" required name="first_name" id="firstname" placeholder="enter first name" onKeyPress="charChk(event,'name');" />
                </div>
              </div>
             <div class="control-group">
                <label class="control-label" for="last_name">Last name</label>
                <div class="controls">
                <input type="text" required name="last_name" id="lastname" placeholder="enter last name" onKeyPress="charChk(event,'alpha');" />
                </div>
              </div>
             <div class="control-group">
              	<label class="control-label" for="gender">Gender</label>
                <div class="controls">
                <label class="pull-left" for="genderM"><input type="radio" name="gender" id="genderM" value="1" checked /> Male</label>
                <label class="pull-left" for="genderF"><input type="radio" name="gender" id="genderF" value="0" /> Female</label>
                </div>
             </div>
             <div class="control-group">
                <label class="control-label" for="age">Age</label>
                <div class="controls">
                <input type='text' name='age' id='age' placeholder='age' maxlength="2" onKeyPress="charChk(event,'num');"/>
                </div>
             </div>
             <div class="control-group">
                <label class="control-label" for="phone">Phone number</label>
                <div class="controls">
                <input type="tel" name="phone" maxlength="10" id="phone" placeholder="enter phone number" onKeyPress="charChk(event,'num');" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ref">Ref. Doctor</label>
                <div class="controls">
                <input type="text" name="ref" id="ref" placeholder="enter Ref doctor" onKeyPress="charChk(event,'name');" />
                </div>
              </div>
               <div class="control-group">
                    <div class="controls">
                      <input type="button" class="btn" onClick="createPatient()" value="Submit">
                    </div>
                  </div>
              </form>
          <!-- end of Create patient tab  -->