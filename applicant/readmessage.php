<?php 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Update the view status of the job registration
$sql = "UPDATE `tbljobregistration` SET HVIEW = 1 WHERE `REGISTRATIONID` = '{$id}'";
$mydb->setQuery($sql);
$mydb->executeQuery();

// Retrieve the job details along with the company information
$sql = "
    SELECT * 
    FROM `tblcompany` c 
    JOIN `tbljobregistration` jr ON c.`COMPANYID` = jr.`COMPANYID` 
    JOIN `tbljob` j ON jr.`JOBID` = j.`JOBID` 
    WHERE `REGISTRATIONID` = '{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

// Retrieve applicant information
$applicant = new Applicants();
$appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Message</h3> 
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?php echo htmlspecialchars($res->OCCUPATIONTITLE); ?></h3>
                            <h5>From: <?php echo htmlspecialchars($res->COMPANYNAME); ?>
                                <span class="mailbox-read-time pull-right">
                                    <?php echo date_format(date_create($res->DATETIMEAPPROVED), 'd M. Y h:i a'); ?>
                                </span>
                            </h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-read-message">
                            <p>Hello <?php echo htmlspecialchars($appl->FNAME); ?>,</p>  
                            <p><?php echo nl2br(htmlspecialchars($res->REMARKS)); ?></p>
                            <p>Thanks,<br><?php echo htmlspecialchars($res->COMPANYNAME); ?></p>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!-- Optional footer actions can be added here -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
