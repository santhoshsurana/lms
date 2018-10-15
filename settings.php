<?php require_once( "class/db.class.php"); $sql="SELECT * FROM `settings` WHERE `test_name`=0 " ; $result=mysqli_query($CON, $sql); ?>
<h3>Normal Range values</h3>
<div class='row-fluid'>
    <div class='span3'>
        <h5>Blood Examination Test</h5>
        <form class='form-horizontal'>
            <?php while($row=mysqli_fetch_array($result)){ ?>
            <div class='control-group'>
                <label class='control-label' for='NR<?php echo $row[0]; ?>'>
                    <?php echo $row[1]; ?>
                </label>
                <div class='controls'>
                    <input type='text' id='NR<?php echo $row[0]; ?>' required value='<?php echo $row[3]; ?>' maxlength="20" onBlur="updateNR('<?php echo $row[0]; ?>')" onKeyPress="charChk(event,'nr');" name='<?php echo $row[1]; ?>' placeholder='enter value' />
                    <input type='hidden' id='NR<?php echo $row[0]; ?>_sys' value='<?php echo $row[3]; ?>' name='NR<?php echo $row[0]; ?>_sys' />
                    <div id='alert<?php echo $row[0]; ?>' style="color:#009900"></div>
                </div>
            </div>
            <?php } ?>
        </form>
    <?php $sql="SELECT * FROM `settings` WHERE `test_name`=4 " ; $result=mysqli_query($CON, $sql); ?>
        <h5>Serume Ectrolyte Test</h5>
        <form class='form-horizontal'>
            <?php while($row=mysqli_fetch_array($result)){ ?>
            <div class='control-group'>
                <label class='control-label' for='Haemoglobin Men'>
                    <?php echo $row[1]; ?>
                </label>
                <div class='controls'>
                    <input type='text' id='NR<?php echo $row[0]; ?>' required value='<?php echo $row[3]; ?>' maxlength="20" onBlur="updateNR('<?php echo $row[0]; ?>')" onKeyPress="charChk(event,'nr');" name='Haemoglobin Men' placeholder='enter value' />
                    <input type='hidden' id='NR<?php echo $row[0]; ?>_sys' value='<?php echo $row[3]; ?>' name='NR<?php echo $row[0]; ?>_sys' />
                    <div id='alert<?php echo $row[0]; ?>' style="color:#009900"></div>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
    <?php $sql="SELECT * FROM `settings` WHERE `test_name`=3 " ; $result=mysqli_query($CON, $sql); ?>
    <div class='offset2 span3'>
        <h5>Bio-Chemistry Test</h5>
        <form class='form-horizontal'>
            <?php while($row=mysqli_fetch_array($result)){ ?>
            <div class='control-group'>
                <label class='control-label' for='Haemoglobin Men'>
                    <?php echo $row[1]; ?>
                </label>
                <div class='controls'>
                    <input type='text' id='NR<?php echo $row[0]; ?>' required value='<?php echo $row[3]; ?>' maxlength="20" onBlur="updateNR('<?php echo $row[0]; ?>')" onKeyPress="charChk(event,'nr');" name='Haemoglobin Men' placeholder='enter value' />
                    <input type='hidden' id='NR<?php echo $row[0]; ?>_sys' value='<?php echo $row[3]; ?>' name='NR<?php echo $row[0]; ?>_sys' />
                    <div id='alert<?php echo $row[0]; ?>' style="color:#009900"></div>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
</div>



