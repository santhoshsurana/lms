<?php session_start();
 if(!isset($_SESSION['username'])) {
	 header('Location: index.php');
	 }
require_once( "class/db.class.php");
if(isset($_GET[ 'fromDate']) && isset($_GET[ 'toDate'])){ $from_date=$_GET[ 'fromDate'];
$to_date=$_GET[ 'toDate'];
} else{ $from_date=date( 'm/d/Y');
$to_date=date( 'm/d/Y');
} $temp=explode('/', $from_date);
$from_date_time=$temp[2].$temp[0].$temp[1]. '000000';
$temp=explode( '/', $to_date);
$to_date_time=$temp[2].$temp[0].$temp[1]. '235959';
?>
<!-- start of Home tab -->
<div class='row-fluid'>
    <h5 class="span6">Hello, <?php echo $_SESSION['username'];?>!</h5>
    <h5 class="span6 pull-left" align="right"><?php echo date('D d M Y');?></h5>
    <label for="from_date" class="pull-left" style="margin:5px">From</label>
    <input name="from_date" id="from_date" class="date-picker pull-left" type="text" value="<?php echo $from_date;?>" />
    <label for="to_date" class="pull-left" style="margin:5px">To</label>
    <input name="to_date" id="to_date" class="date-picker pull-left" type="text" value="<?php echo $to_date;?>" />
    <button onClick="ViewResults('home.php?');" style="margin:0px 5px;" class="btn btn-inverse">Results</button>
</div>
<div class='row-fluid'>
    <div class="span4">
        <div class="board-widgets orange small-widget">
            <a href="#"><span class="widget-stat">Rs.<?php $sql = "SELECT SUM(`total_amount`) FROM `tests` WHERE `test_type`=0 AND `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	if($count[0]=="")
	{ echo "0";
	}else{
	echo $count[0];
	}?>/-</span>
                            <span class="widget-icon"></span>
                            <span class="widget-label">Medcis Amount</span></a>
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets bondi-blue small-widget">
            <a href="#"><span class="widget-stat">Rs.<?php $sql = "SELECT SUM(`total_amount`) FROM `tests` WHERE `test_type`=1 AND `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	if($count[0]=="")
	{ echo "0";
	}else{
	echo $count[0];
	}?>/-</span>
                    	<span class="widget-icon"></span>
                        <span class="widget-label">Tests Amount</span></a>
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets gray small-widget">
            <a href="#"><span class="widget-stat" id="time"></span>
                    	<span class="widget-icon"></span>
                        <span class="widget-label">Time</span></a>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class="span4">
        <div class="board-widgets brown small-widget">
            <a href="#"><span class="widget-stat"><?php $sql = "SELECT COUNT(*) FROM `patients` WHERE `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	echo $count[0];?></span>
                    	<span class="widget-icon"></span>
                        <span class="widget-label">Patients</span></a>
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets blue-violate small-widget">
            <a href="#"><span class="widget-stat"><?php $sql = "SELECT COUNT(*) FROM `tests` WHERE `test_type`=1 AND `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	echo $count[0];?></span>
                            <span class="widget-icon"></span>
                            <span class="widget-label">Tests</span></a>
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets dark-yellow small-widget">
            <a href="#"><span class="widget-stat"><?php $sql = "SELECT COUNT(*) FROM `tests` WHERE `test_type`=0 AND `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	echo $count[0];?></span>
                    	<span class="widget-icon"></span>
                        <span class="widget-label">Medcis</span></a>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class="span4">
        <div class="board-widgets magenta small-widget">
            <a href="#"><span class="widget-stat">Rs.<?php $sql = "SELECT SUM(`paid_amount`) FROM `tests` WHERE `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	if($count[0]=="")
	{ echo "0";
	}else{
	echo $count[0];
	}?>/-</span>
						<span class="widget-icon"></span>
                        <span class="widget-label">Paid Amount</span></a>	
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets pale-blue small-widget">
            <a href="#"><span class="widget-stat">Rs.<?php $sql = "SELECT SUM(`due_amount`) FROM `tests` WHERE `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	if($count[0]=="")
	{ echo "0";
	}else{
	echo $count[0];
	}?>/-</span>
                    	<span class="widget-icon"></span>
                        <span class="widget-label">Balance Amount</span></a>
        </div>
    </div>
    <div class="span4">
        <div class="board-widgets green small-widget">
            <a href="#"><span class="widget-stat">Rs.<?php $sql = "SELECT SUM(`total_amount`) FROM `tests` WHERE `date` BETWEEN ".$from_date_time." AND ".$to_date_time;
	$result=mysqli_query($CON, $sql);
	$count = mysqli_fetch_row($result);
	if($count[0]=="")
	{ echo "0";
	}else{
	echo $count[0];
	} ?>/-</span>
						<span class="widget-icon"></span>
                        <span class="widget-label">Total Amount</span></a>	
        </div>
    </div>
</div>
<!-- end of Home tab -->
<script>
    $('.date-picker').datepicker();
</script>