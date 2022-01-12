<?php

require_once('validate-session.php');
require_once("nav-admin.php");
?>


<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="<?php echo  FRONT_ROOT."JobOffer/Edit "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Edit JobOffer</h3>
                                </div>
                            </div>
                            <select name="jobOfferId" id="jobOfferId" class="form-control">
                            <option value="0">Choose JobOffer Number</option>
                            <?php foreach($jobOfferList as $jobOffer){?>
                                <option value="<?php echo $jobOffer->getJobOfferId()?>"><?php echo $jobOffer->getJobOfferId()?></option>
                          <?php  } ?>
                            </select>
                            <br>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="description" placeholder="Description" value="" id="description" required> </div>                  
                          <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Edit Job Offer"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
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