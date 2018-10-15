<?php 	
session_start();
	require_once( "db.class.php");
	$username=$_SESSION[ 'username'];
	$sql="SELECT `role` FROM `users` WHERE `username`= '$username' " ;
	$result=mysqli_query($CON, $sql);
	$admin=mysqli_fetch_array($result);
	$search=$_GET['searchkey'];
	 if(isset($_GET[ 'p'])){
		 $page=$_GET['p'];
		 }
	 else{
		 $page=0;
		 }
	$page_back=$page-15;
	if($page_back<0){
		$page_back=0;
	    $page_back_limit=0;
		}
	 else{ 
	    $page_back_limit=1;
		}
	$page_next=$page+15;
$sql="SELECT * FROM `patients` WHERE `phone`='$search' OR `id`='$search' OR `first_name` LIKE '%$search%' OR  `last_name` LIKE '%$search%'  ORDER BY date DESC LIMIT ".$page_back. ", ".$page_back_limit;
$result=mysqli_query($CON, $sql);
$back_page_count=mysqli_num_rows($result);
$sql="SELECT * FROM `patients` WHERE `phone`='$search' OR `id`='$search' OR `first_name` LIKE '%$search%' OR  `last_name` LIKE '%$search%'  ORDER BY date DESC LIMIT " .$page_next. ", 1";
$result=mysqli_query($CON, $sql);
$next_page_count=mysqli_num_rows($result); ?>
     
<button onClick="display('class/search.class.php?p=<?php echo $page_back; ?>&searchkey=<?php echo $search; ?>);" style="margin:0px 5px;" <?php if($back_page_count==0){echo 'disabled'; }?> class="btn pull-left"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="display('class/search.class.php?p=<?php echo $page_next; ?>&searchkey=<?php echo $search; ?>);" style="margin:0px 5px;" <?php if($next_page_count==0){echo 'disabled'; }?> class="btn">next<i class="icon-circle-arrow-right"></i></button>

<?php $sql="SELECT * FROM `patients` WHERE `phone`='$search' OR `id`='$search' OR `first_name` LIKE '%$search%' OR  `last_name` LIKE '%$search%'  ORDER BY date DESC LIMIT " .$page. ", 15";
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