<?php 	session_start();
	require_once( "db.class.php");
	$username=$_SESSION[ 'username'];
	$sql="SELECT `role` FROM `users` WHERE `username`= '$username' " ;
	$result=mysqli_query($CON, $sql);
	$admin=mysqli_fetch_array($result);
	 if(isset($_GET[ 'p'])){
		 $page=$_GET['p'];
		 }
	 else{
		 $page=0;
		 }
	 if(isset($_GET['fromDate']) && isset($_GET['toDate'])){ 
	    $from_date=$_GET['fromDate'];
	    $to_date=$_GET['toDate'];
		}
	 else{
		 $from_date=date('m/d/Y');
		 $to_date=date('m/d/Y');
		 }
		 $temp=explode('/', $from_date);
		 $from_date_time= $temp[2].$temp[0].$temp[1].'000000';
		 $temp=explode('/', $to_date);
		 $to_date_time= $temp[2].$temp[0].$temp[1].'235959';
	$page_back=$page-15;
	if($page_back<0){
		$page_back=0;
	    $page_back_limit=0;
		}
	 else{ 
	    $page_back_limit=1;
		}
	$page_next=$page+15;
$sql="SELECT * FROM `patients` WHERE date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY date DESC LIMIT ".$page_back. ", ".$page_back_limit;
$result=mysqli_query($CON, $sql);
$back_page_count=mysqli_num_rows($result);
$sql="SELECT * FROM `patients` WHERE date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY date DESC LIMIT " .$page_next. ", 1";
$result=mysqli_query($CON, $sql);
$next_page_count=mysqli_num_rows($result); ?>
     
<button onClick="ViewResults('class/viewpatient.class.php?p=<?php echo $page_back; ?>&from_date=<?php echo $from_date;?>&to_date=<?php echo $to_date;?>');" style="margin:0px 5px;" <?php if($back_page_count==0){echo 'disabled'; }?> class="btn pull-left"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="ViewResults('class/viewpatient.class.php?p=<?php echo $page_next; ?>&from_date=<?php echo $from_date;?>&to_date=<?php echo $to_date;?>');" style="margin:0px 5px;" <?php if($next_page_count==0){echo 'disabled'; }?> class="btn pull-left">next<i class="icon-circle-arrow-right"></i></button>
<label for="from_date" class="pull-left" style="margin:5px">From</label>
<input name="from_date" id="from_date" class="date-picker pull-left" type="text" value="<?php echo $from_date;?>" />
<label for="to_date" class="pull-left" style="margin:5px">To</label>
<input name="to_date" id="to_date" class="date-picker pull-left" type="text" value="<?php echo $to_date;?>" />
<button onClick="ViewResults('class/viewpatient.class.php?');" style="margin:0px 5px;" class="btn btn-inverse">Results</button>

<?php $sql="SELECT * FROM `patients` WHERE date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY date DESC LIMIT " .$page. ", 15";
	$result=mysqli_query($CON,$sql);
	 $page_count=mysqli_num_rows($result);
	 if($page_count!=0){ ?>
 <h3>Patients List</h3>
<!-- start of View patient tab  -->
              <table class='table table-hover table-bordered'>
              <thead>
              	<tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Ref Doctor</th>
                    <th>Last visit</th>
                    <th>create Test</th>
                    <th>Edit</th>
                    <?php 
		 	if($admin['role']==0){ ?>
		  <th>Delete</th>
		 <?php } ?>
                </tr>
                </thead>
                <tbody>
<?php
	while($data=mysqli_fetch_array($result))
	{
		if($data['gender']==1){
			$data['gender']="male";
		}elseif($data['gender']==0){
			$data['gender']="female";
		}
		 $data['date']=date("d-m-Y h:i:a", strtotime($data['date']));
		 ?>
		<tr>
         <td><?php echo $data['id']; ?></td>	
         <td><?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?></td>
         <td><?php echo $data['age']; ?></td>
		 <td><?php echo $data['gender']; ?></td>
		 <td><?php echo $data['phone']; ?></td>
		 <td>Dr.<?php echo $data['reference']; ?></td>
		 <td><?php echo $data['date']; ?></td>
         <td><button class='btn' onClick='showCreatetest(<?php echo $data['id']; ?>)'><i class='icon-list-alt'></i></button></td>
         <td><button class='btn' onClick='editPatient(<?php echo $data['id']; ?>)'><i class='icon-edit'></i></button></td>
         <?php 
		 	if($admin['role']==0){ ?>
		 <td><button class='btn' onClick='deletePatient(<?php echo $data['id']; ?>)'><i class='icon-remove'></i></button></td>
		 <?php } ?>
        </tr>
 <?php }?>
</tbody>
</table>
<!-- end of View patient tab  -->
<?php }
else{
echo "<h3 align='center'>No Records Found!</h3>";
 }
 ?>
<script>$('.date-picker').datepicker(); </script> 