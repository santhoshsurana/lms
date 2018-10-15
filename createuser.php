 <!-- start of create User tab  -->
              <form class="form-horizontal">
				<div class="control-group">
              	<label class="control-label" for="username">Username</label>
                    <div class="controls">
                    <input type="text" id="username" required name="username" placeholder="enter username"  onKeyPress="charChk(event,'alpha');"  />
                    </div>
  				</div>	
                <div class="control-group">
                <label class="control-label" for="password">Password</label>
                	<div class="controls">
                	<input type="password" id="password" required name="password" placeholder="********"/>
                    </div>
  				</div>
                <div class="control-group">
                <label class="control-label" for="re-password">Retype-Password</label>
                	<div class="controls">
                	<input type="password" id="repassword" required name="repassword" placeholder="********"/>
                    </div>
  				</div>
                <div class="control-group">
                	<label class="control-label" for="role">Role</label>
                    <div class="controls">
                    <select name="role" id="role">
                        <option>- User Role -</option>
                        <option value="0">Administrator</option>
                        <option value="1">Employee</option>
                    </select>
                    </div>
  				</div>
                  <div class="control-group">
                    <div class="controls">
                      <input type="button" name="cuser" value="submit" class="btn" onClick="createUser()">
                    </div>
                  </div>
              </form>
          <!-- end of create User tab  -->