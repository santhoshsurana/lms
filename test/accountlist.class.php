
<?php
session_start();
require_once("db.class.php");
$username = $_SESSION['username'];
$sql      = "SELECT `user_role` FROM `users` WHERE `username`= '$username' ";
$result   = mysqli_query($CON, $sql);
$admin    = mysqli_fetch_array($result);
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 0;
}
if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
    $from_date = $_GET['fromDate'];
    $to_date   = $_GET['toDate'];
} else {
    $from_date = date('m/d/Y');
    $to_date   = date('m/d/Y');
}
$temp           = explode('/', $from_date);
$from_date_time = $temp[2] . $temp[0] . $temp[1] . '000000';
$temp           = explode('/', $to_date);
$to_date_time   = $temp[2] . $temp[0] . $temp[1] . '235959';
$page_back      = $page - 10;
if ($page_back < 0) {
    $page_back       = 0;
    $page_back_limit = 0;
} else {
    $page_back_limit = 1;
}
$page_next       = $page + 10;
$sql             = "SELECT * FROM `customers` WHERE `customer_since` BETWEEN " . $from_date_time . " AND " . $to_date_time . " ORDER BY `customer_since` DESC LIMIT " . $page_back . ", " . $page_back_limit;
$result          = mysqli_query($CON, $sql);
$back_page_count = mysqli_num_rows($result);
$sql             = "SELECT * FROM `customers` WHERE `customer_since` BETWEEN " . $from_date_time . " AND " . $to_date_time . " ORDER BY `customer_since` DESC LIMIT " . $page_next . ", 1";
$result          = mysqli_query($CON, $sql);
$next_page_count = mysqli_num_rows($result);
?>
<button onClick="ViewResults('class/customerlist.class.php?p=<?php
echo $page_back;
?>&from_date=<?php
echo $from_date;
?>&to_date=<?php
echo $to_date;
?>');" style="margin:0px 5px;" <?php
if ($back_page_count == 0) {
    echo 'disabled';
}
?> class="btn pull-left"><i class="icon-circle-arrow-left"></i>back</button>
<button onClick="ViewResults('class/customerlist.class.php?p=<?php
echo $page_next;
?>&from_date=<?php
echo $from_date;
?>&to_date=<?php
echo $to_date;
?>');" style="margin:0px 5px;" <?php
if ($next_page_count == 0) {
    echo 'disabled';
}
?> class="btn pull-left">next<i class="icon-circle-arrow-right"></i></button>
<label for="from_date" class="pull-left" style="margin:5px">From</label>
<input name="from_date" id="from_date" class="date-picker pull-left" type="text" value="<?php
echo $from_date;
?>" />
<label for="to_date" class="pull-left" style="margin:5px">To</label>
<input name="to_date" id="to_date" class="date-picker pull-left" type="text" value="<?php
echo $to_date;
?>" />
<button onClick="ViewResults('class/customerlist.class.php?');" style="margin:0px 5px;" class="btn btn-inverse">Results</button>

<?php
$sql        = "SELECT * FROM `customers` WHERE `customer_since` BETWEEN " . $from_date_time . " AND " . $to_date_time . " ORDER BY `customer_since` DESC LIMIT " . $page . ", 10";
$result     = mysqli_query($CON, $sql);
$page_count = mysqli_num_rows($result);
if ($page_count != 0) {
?>
 <h3>customers List</h3>
<!-- start of View customer tab  -->
              <table class='table table-hover table-bordered'>
              <thead>
                  <tr>
                    <th>customer ID</th>
                    <th>customer Name</th>
                    <th>Age</th>
                    <th>Gender</th>
					<th>Occupation</th>
                    <th>mobile number</th>
                    <th>alternate mobile number</th>
					<th>Aadhar Number</th>
                    <th>Address</th>
                    <th>customer since</th>
                    <th>New Account</th>
                    <th>Edit</th>
                    <?php
    if ($admin['user_role'] == 0) {
?>
         <th>Delete</th>
         <?php
    }
?>
               </tr>
                </thead>
                <tbody>
<?php
    while ($data = mysqli_fetch_array($result)) {
        if ($data['customer_gender'] == 1) {
            $data['customer_gender'] = "male";
        } elseif ($data['customer_gender'] == 0) {
            $data['customer_gender'] = "female";
        }
        $data['customer_since'] = date("d-m-Y h:i:a", strtotime($data['customer_since']));
?>
       <tr>
         <td><?php
        echo $data['cin'];
?></td>    
         <td><?php
        echo $data['customer_first_name'];
?> <?php
        echo $data['customer_last_name'];
?></td>
         <td><?php
        echo $data['customer_age'];
?></td>
         <td><?php
        echo $data['customer_gender'];
?></td>
         <td><?php
        echo $data['customer_occupation'];
?></td>
		<td><?php
        echo $data['customer_mobile'];
?></td>
         <td><?php
        echo $data['customer_altmobile'];
?></td>
         <td><?php
        echo $data['customer_aadhar'];
?></td>
		<td><?php
        echo $data['customer_address'].', kakinada, east godavari, andhra pradesh, 533001';
?></td>
		<td><?php
        echo $data['customer_since'];
?></td>
         <td><button class='btn' onClick='newAccount(<?php
        echo $data['cin'];
?>)'><i class='icon-list-alt'></i></button></td>
         <td><button class='btn' onClick='editCustomer(<?php
        echo $data['cin'];
?>)'><i class='icon-edit'></i></button></td>
         <?php
        if ($admin['user_role'] == 0) {
?>
        <td><button class='btn' onClick='deleteCustomer(<?php
            echo $data['cin'];
?>)'><i class='icon-remove'></i></button></td>
         <?php
        }
?>
       </tr>
 <?php
    }
?>
</tbody>
</table>
<!-- end of View customer tab  -->
<?php
} else {
    echo "<h3 align='center'>No Records Found!</h3>";
}
?>
<script>$('.date-picker').datepicker(); </script> 
