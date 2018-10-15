<?php 
	session_start();
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
	
$sql="SELECT t.id, t.test_name, p.first_name, p.last_name, t.total_amount, t.paid_amount, t.due_amount, t.date FROM patients p, tests t WHERE t.patient_name=p .id AND t.test_type='0' AND t.date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY t.date DESC LIMIT ".$page_back. ", ".$page_back_limit;
$result=mysqli_query($CON,$sql);
$back_page_count=mysqli_num_rows($result);

$sql="SELECT t.id, t.test_name, p.first_name, p.last_name, t.total_amount, t.paid_amount, t.due_amount, t.date FROM patients p, tests t WHERE t.patient_name=p .id AND t.test_type='0' AND t.date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY t.date DESC LIMIT " .$page_next. ", 1"; 
$result=mysqli_query($CON,$sql);
$next_page_count=mysqli_num_rows($result); 

$sql="SELECT SUM(t.total_amount) FROM patients p, tests t WHERE t.patient_name=p .id AND t.test_type='0' AND t.date BETWEEN ".$from_date_time." AND ".$to_date_time;
$result=mysqli_query($CON,$sql);
$total_amount=mysqli_fetch_row($result);
?>

<button onClick="ViewResults('class/viewmedics.class.php?p=<?php echo $page_back; ?>&from_date=<?php echo $from_date;?>&to_date=<?php echo $to_date;?>');" style="margin:0px 5px;" <?php if($back_page_count==0){echo 'disabled'; }?> class="btn pull-left"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="ViewResults('class/viewmedics.class.php?p=<?php echo $page_next; ?>&from_date=<?php echo $from_date;?>&to_date=<?php echo $to_date;?>');" style="margin:0px 5px;" <?php if($next_page_count==0){echo 'disabled'; }?> class="btn pull-left">next<i class="icon-circle-arrow-right"></i></button>
<label for="from_date" class="pull-left" style="margin:5px">From</label>
<input name="from_date" id="from_date" class="date-picker pull-left" type="text" value="<?php echo $from_date;?>" />
<label for="to_date" class="pull-left" style="margin:5px">To</label>
<input name="to_date" id="to_date" class="date-picker pull-left" type="text" value="<?php echo $to_date;?>" />
<button onClick="ViewResults('class/viewmedics.class.php?');" style="margin:0px 5px;" class="btn btn-inverse">Results</button>Total Amount: Rs <?php if($total_amount[0]!=''){echo $total_amount[0];}else{echo '0';}?>/-

<?php $sql="SELECT t.id, t.test_name, p.first_name, p.last_name, t.total_amount, t.paid_amount, t.due_amount, t.date FROM patients p, tests t WHERE t.patient_name=p .id AND t.test_type='0' AND t.date BETWEEN ".$from_date_time." AND ".$to_date_time." ORDER BY t.date DESC LIMIT " .$page. ", 15";
$result=mysqli_query($CON,$sql);
$page_count=mysqli_num_rows($result);
if($page_count!=0){ ?>
<!-- start of medics tab  -->
<h3>Medcis List </h3>
<table class='table table-hover table-bordered'>
    <thead>
        <tr>
            <th>Test ID</th>
            <th>Patient Name</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Date</th>
            <th>Edit</th>
            <?php if($admin[ 'role']==0){ ?>
            <th>Delete</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php while($data=mysqli_fetch_array($result)) { $data[ 'date']=date( "d-m-Y h:i:a", strtotime($data[ 'date'])); ?>
        <tr>
            <td>
                <?php echo $data[ 'id']; ?>
            </td>
            <td><?php echo $data[ 'first_name']." ".$data[ 'last_name']; ?>
            </td>
            <td>
                <?php echo $data[ 'total_amount']; ?>
            </td>
            <td>
                <?php echo $data[ 'paid_amount']; ?>
            </td>
            <td>
                <?php echo $data[ 'due_amount']; ?>
            </td>
            <td>
                <?php echo $data[ 'date']; ?>
            </td>
            <td>
                <button class='btn' onClick="editTest(<?php echo $data['id']; ?>)"><i class='icon-edit'></i>
                </button>
            </td>
            <?php if($admin[ 'role']==0){ ?>
            <td>
                <button class='btn' onClick="deleteTest(<?php echo $data['id']; ?>, '0')"><i class='icon-remove'></i></button>
            </td>
            <?php } ?>
        </tr>
        <?php }?>
    </tbody>
</table>
<!-- end of medics tab  -->
<?php } else{ echo "<h3 align='center'>No Records Found!</h3>"; } ?>

<script>
    $('.date-picker').datepicker();
</script>