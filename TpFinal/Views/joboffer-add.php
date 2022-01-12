<?php
require_once("validate-session.php");
require_once("nav-admin.php");

?>

<body>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form autocomplete="off" class="md-float-material form-material" action="<?php echo  FRONT_ROOT."JobOffer/Add "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Add New JobOffer</h3>
                                </div>
                            </div>

                            <br>
                            <div class="form-group form-primary"> <select name="jobPositionId" id="jobPositionId" class="form-control"> </div>
                                                                    <option value="0">Choose Job Position</option>
                                                                    <?php foreach($jobPositionList as $jobPosition){ ?>
                                                                        <option value="<?php echo $jobPosition->getJobPositionId()?>"><?php echo $jobPosition->getDescription()?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <br>
                                                                    <div class="form-group form-primary"> <select name="companyId" id="companyId" class="form-control"> </div>
                                                                    <option value="0">Choose Company </option>
                                                                    <?php foreach($companyList as $company){ ?>
                                                                        <option value="<?php echo $company->getCompanyId()?>"><?php echo $company->getCompanyName()?></option>
                                                                        <?php } ?>
                                                                    </select>                                            
                                                                    <br>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="description" placeholder="Description" value="" id="description" required> </div>
                           
                          

                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Add JobOffer"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</div>

</body>