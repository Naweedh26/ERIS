<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "admin/index.php");
}

$companyid = $_GET['id'];
$company = new Company();
$res = $company->single_company($companyid);
?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Company</h1>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COMPANYNAME">Company Name:</label>
            <div class="col-md-8">
                <input type="hidden" name="COMPANYID" value="<?php echo $res->COMPANYID; ?>">
                <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder="Company Name" type="text" value="<?php echo htmlspecialchars($res->COMPANYNAME); ?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COMPANYADDRESS">Company Address:</label> 
            <div class="col-md-8">
                <textarea class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder="Company Address" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo htmlspecialchars($res->COMPANYADDRESS); ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="COMPANYCONTACTNO">Company Contact No.:</label>
            <div class="col-md-8">
                <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder="Company Contact No." type="text" value="<?php echo htmlspecialchars($res->COMPANYCONTACTNO); ?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8">
            <label class="col-md-4 control-label" for="idno"></label>
            <div class="col-md-8">
                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
            </div>
        </div>
    </div>
</form>
