<?php  
if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root."admin/index.php");
}

@$empid = $_GET['id'];
if ($empid == '') {
    redirect("index.php");
}

$employee = New Employee();
$emp = $employee->single_employee($empid);

$birthday = date_format(date_create($emp->BIRTHDATE), 'm/d/Y');
$mv = date_format(date_create($emp->BIRTHDATE), 'm');
$m = date_format(date_create($emp->BIRTHDATE), 'M');
$d = date_format(date_create($emp->BIRTHDATE), 'd');
$y = date_format(date_create($emp->BIRTHDATE), 'Y');

$radio = $emp->SEX == 'Male' ? '
<div class="col-md-8">
    <div class="col-lg-5">
        <div class="radio">
            <label><input id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="radio">
            <label><input id="optionsRadios2" checked="True" name="optionsRadios" type="radio" value="Male">Male</label>
        </div>
    </div> 
</div>' : '
<div class="col-md-8">
    <div class="col-lg-5">
        <div class="radio">
            <label><input id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="radio">
            <label><input id="optionsRadios2" name="optionsRadios" type="radio" value="Male">Male</label>
        </div>
    </div> 
</div>';

$civilstatusOptions = [
    'none' => 'Select',
    'Single' => 'Single',
    'Married' => 'Married',
    'Widow' => 'Widow'
];
$civilstatus = '<select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">';
foreach ($civilstatusOptions as $value => $label) {
    $selected = $emp->CIVILSTATUS == $value ? 'SELECTED' : '';
    $civilstatus .= "<option value='$value' $selected>$label</option>";
}
$civilstatus .= '</select>';

$workstatusOptions = [
    'none' => 'Select',
    'Temporary' => 'Temporary',
    'Regular' => 'Regular',
    'Probationary' => 'Probationary'
];
$workstatus = '<select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">';
foreach ($workstatusOptions as $value => $label) {
    $selected = $emp->WORKSTATS == $value ? 'SELECTED' : '';
    $workstatus .= "<option value='$value' $selected>$label</option>";
}
$workstatus .= '</select>';

?>

<div class="center wow fadeInDown">
    <h2 class="page-header">Update Employee</h2>
</div>

<form class="form-horizontal span6 wow fadeInDown" action="controller.php?action=edit" method="POST"> 
    <input id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->EMPLOYEEID; ?>">
    
    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="FNAME">Firstname:</label>
            <div class="col-md-8"> 
                <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Firstname" type="text" value="<?php echo $emp->FNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="LNAME">Lastname:</label>
            <div class="col-md-8"> 
                <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder="Lastname" value="<?php echo $emp->LNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="MNAME">Middle Name:</label>
            <div class="col-md-8"> 
                <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder="Middle Name" value="<?php echo $emp->MNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="ADDRESS">Address:</label>
            <div class="col-md-8">
                <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder="Address" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $emp->ADDRESS; ?></textarea>
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="Gender">Sex:</label>
            <?php echo $radio; ?>
        </div>
    </div>  

    <div class="form-group">
        <div class="rows">
            <div class="col-md-8">
                <h4>
                <div class="col-md-4">
                    <label class="col-lg-12 control-label">Date of Birth</label>
                </div>
                <div class="col-lg-3">
                    <select class="form-control input-sm" name="month">
                        <option>Month</option>
                        <?php
                        echo '<option SELECTED value='.$mv.'>'.$m.'</option>';
                        $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 12 );    
                        foreach ($mon as $month => $value) { 
                            echo '<option value='.$value.'>'.$month.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control input-sm" name="day">
                        <option>Day</option>
                        <?php 
                        echo '<option SELECTED value='.$d.'>'.$d.'</option>';
                        $d = range(1, 31);
                        foreach ($d as $day) {
                            echo '<option value='.$day.'>'.$day.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select class="form-control input-sm" name="year">
                        <option>Year</option>
                        <?php 
                        echo '<option SELECTED value='.$y.'>'.$y.'</option>';
                        $years = range(2010, 1900);
                        foreach ($years as $yr) {
                            echo '<option value='.$yr.'>'.$yr.'</option>';
                        }
                        ?>
                    </select>
                </div>
                </h4>
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="BIRTHPLACE">Place of Birth:</label>
            <div class="col-md-8">
                <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $emp->BIRTHPLACE; ?></textarea>
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="TELNO">Contact No.:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder="Contact No." type="text" value="<?php echo $emp->TELNO; ?>" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="CIVILSTATUS">Civil Status:</label>
            <div class="col-md-8">
                <?php echo $civilstatus; ?>
            </div>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="POSITION">Position:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder="Position" type="text" value="<?php echo $emp->POSITION; ?>" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="DATEHIRED">Hired Date:</label>
            <div class="col-md-8">
                <div class="input-group"> 
                    <div class="input-group-addon"> 
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input id="datemask2" name="DATEHIRED" value="<?php echo date_format(date_create($emp->DATEHIRED), 'm/d/Y'); ?>" type="text" class="form-control input-sm datemask2" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                </div>       
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="EMP_EMAILADDRESS">Email Address:</label> 
            <div class="col-md-8">
                <input type="Email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="Email Address" value="<?php echo  $emp->EMP_EMAILADDRESS; ?>" /> 
            </div>
        </div>
    </div>  

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COMPANYNAME">Company Name:</label>
            <div class="col-md-8"> 
                <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                    <option value="None">Select</option>
                    <?php 
                    $sql = "SELECT * FROM tblcompany WHERE COMPANYID = ".$emp->COMPANYID;
                    $mydb->setQuery($sql);
                    $result = $mydb->loadResultList();
                    foreach ($result as $row) {
                        echo '<option SELECTED value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                    }
                    $sql = "SELECT * FROM tblcompany WHERE COMPANYID != ".$emp->COMPANYID;
                    $mydb->setQuery($sql);
                    $result = $mydb->loadResultList();
                    foreach ($result as $row) {
                        echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>  

    <div class="form-group">
        <div class="col-md-8">
            <div class="col-md-4 control-label"></div>
            <div class="col-md-8">
                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button> 
            </div>
        </div>
    </div> 
</form>
