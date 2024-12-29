<?php 
if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "admin/index.php");
}

$autonum = new Autonumber();
$res = $autonum->set_autonumber('employeeid');
?>

<section id="feature" class="transparent-bg">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2 class="page-header">Add New Employee</h2>
        </div>

        <div class="row">
            <div class="features">
                <form class="form-horizontal span6 wow fadeInDown" action="controller.php?action=add" method="POST">
                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="EMPLOYEEID">Employee ID:</label>
                            <div class="col-md-8"> 
                                <input class="form-control input-sm" id="EMPLOYEEID" name="EMPLOYEEID" placeholder="Employee ID" type="text" value="<?php echo $res->AUTO; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="FNAME">Firstname:</label>
                            <div class="col-md-8">
                                <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Firstname" type="text" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="LNAME">Lastname:</label>
                            <div class="col-md-8">
                                <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder="Lastname" type="text" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="MNAME">Middle Name:</label>
                            <div class="col-md-8">
                                <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder="Middle Name" type="text" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="ADDRESS">Address:</label>
                            <div class="col-md-8">
                                <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder="Address" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="Gender">Sex:</label>
                            <div class="col-md-8">
                                <label><input checked name="optionsRadios" type="radio" value="Female">Female</label>
                                <label><input name="optionsRadios" type="radio" value="Male"> Male</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label">Date of Birth</label>
                            <div class="col-lg-8">
                                <select class="form-control input-sm" name="month">
                                    <option>Month</option>
                                    <?php
                                    $months = ['Jan' => 1, 'Feb' => 2, 'Mar' => 3, 'Apr' => 4, 'May' => 5, 'Jun' => 6, 'Jul' => 7, 'Aug' => 8, 'Sep' => 9, 'Oct' => 10, 'Nov' => 11, 'Dec' => 12];    
                                    foreach ($months as $month => $value) {
                                        echo '<option value="' . $value . '">' . $month . '</option>';
                                    }
                                    ?>
                                </select>

                                <select class="form-control input-sm" name="day">
                                    <option>Day</option>
                                    <?php 
                                    for ($day = 1; $day <= 31; $day++) {
                                        echo '<option value="' . $day . '">' . $day . '</option>';
                                    }
                                    ?>
                                </select>

                                <select class="form-control input-sm" name="year">
                                    <option>Year</option>
                                    <?php 
                                    for ($year = date("Y"); $year >= 1900; $year--) {
                                        echo '<option value="' . $year . '">' . $year . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="BIRTHPLACE">Place of Birth:</label>
                            <div class="col-md-8">
                                <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="TELNO">Contact No.:</label>
                            <div class="col-md-8">
                                <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder="Contact No." type="text" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="CIVILSTATUS">Civil Status:</label>
                            <div class="col-md-8">
                                <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                    <option value="none">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="POSITION">Position:</label>
                            <div class="col-md-8">
                                <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder="Position" type="text" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="EMP_HIREDDATE">Hired Date:</label> 
                            <div class="col-md-8">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control input-sm date_picker" id="HIREDDATE" name="EMP_HIREDDATE" placeholder="mm/dd/yyyy" required autocomplete="off"/> 
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="EMP_EMAILADDRESS">Email Address:</label> 
                            <div class="col-md-8">
                                <input type="email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="Email Address" required autocomplete="off"/> 
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" for="COMPANYID">Company Name:</label>
                            <div class="col-md-8">
                                <select class="form-control input-sm" id="COMPANYID" name="COMPANYID" required>
                                    <option value="None">Select</option>
                                    <?php 
                                    $sql ="SELECT * FROM tblcompany";
                                    $mydb->setQuery($sql);
                                    $companies = $mydb->loadResultList();
                                    foreach ($companies as $company) {
                                        echo '<option value="' . $company->COMPANYID . '">' . $company->COMPANYNAME . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>  
    </div>  
</section>
