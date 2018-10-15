<?php 
require_once( "db.class.php"); 
if(isset($_GET[ 'p'])){
$page=$_GET[ 'p'];
}else{
	$page=0;
}
$page_back=$page-15; 
if($page_back<0){
	$page_back=0;
	$page_back_limit=0;
	}else{
	$page_back_limit=1;
	}
$page_next=$page+15;
$sql="SELECT * FROM `users`  LIMIT ".$page_back. ", ".$page_back_limit;
$result=mysqli_query($CON, $sql);
$back_page_count=mysqli_num_rows($result);
$sql="SELECT * FROM `users`  LIMIT " .$page_next. ", 1";
$result=mysqli_query($CON, $sql);
$next_page_count=mysqli_num_rows($result); ?>    
<button onClick="display('class/viewuser.class.php?p=<?php echo $page_back; ?>');" style="margin:0px 5px;" <?php if($back_page_count==0){echo 'disabled'; }?> class="btn pull-left"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="display('class/viewuser.class.php?p=<?php echo $page_next; ?>');" style="margin:0px 5px;" <?php if($next_page_count==0){echo 'disabled'; }?> class="btn">next<i class="icon-circle-arrow-right"></i></button>

<?php $sql="SELECT * FROM `users`  LIMIT " .$page. ", 15";
	 $result=mysqli_query($CON,$sql);
	 $page_count=mysqli_num_rows($result);
	 if($page_count!=0){ ?>
		<!-- start of view User tab  -->
        <h3>Users List</h3>
              <table class='table table-hover table-bordered'>
              <thead>
              	<tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>created date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
<?php
	$i=1;
	while($data=mysqli_fetch_array($result))
	{
		if($data['role']==0){
			$data['role']="Adminnistrator";
			$flag=1;
		}else{
			$data['role']="employee";
			$flag=0;
		}
		?>
   <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['role']; ?></td>
        <td><?php echo $data['date']; ?></td>
        <td><button class='btn' onClick='editUser(<?php echo $data['id']; ?>)'><i class='icon-edit'></i></button></td>
        <td><?php if($flag!=1){?><button class='btn' onClick='deleteUser(<?php echo $data['id']; ?>)'><i class='icon-remove'></i></button><?php }?></td>
    </tr>
<?php
		$i++;
	}
	?>
</tbody>
</table>
<!-- end of User tab  -->
<?php } ?>
      