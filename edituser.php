 <?php require_once("class/db.class.php");
 	$userId=$_GET['userId'];
	$sql = "SELECT `username` FROM `users` WHERE `id`=".$userId;
	$result=mysqli_query($CON, $sql);
	$data=mysqli_fetch_array($result);
?>
 <!-- start of create User tab  -->
 <button onClick="display('class/viewuser.class.php?p=0');" class="btn" ><i class="icon-circle-arrow-left"></i>back</button>
              <form class="form-horizontal">
                <div class="control-group">
                <label class="control-label" for="username">username</label>
                	<div class="controls">
                	<input type="text" id="username"  name="username" readonly value="<?php echo $data['username'];?>"/>
                    </div>
  				</div>
                <div class="control-group">
                <label class="control-label" for="password">New Password</label>
                	<div class="controls">
                	<input type="password" id="password"  name="password" placeholder="********"/>
                    </div>
  				</div>
                <div class="control-group">
                <label class="control-label" for="repassword">Retype-Password</label>
                	<div class="controls">
                	<input type="password" id="repassword"  name="repassword" placeholder="********"/>
                    </div>
  				</div>
                  <div class="control-group">
                    <div class="controls">
                      <input type="button" name="euser" value="submit" class="btn" onClick="updateUser(<?php echo $_GET['userId'];?>)">
                    </div>
                  </div>
              </form>
          <!-- end of create User tab  -->