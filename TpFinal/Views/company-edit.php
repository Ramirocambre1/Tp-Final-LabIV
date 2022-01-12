<?php

require_once('validate-session.php');
require_once("nav-admin.php");

?>
<body>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="<?php echo  FRONT_ROOT."Company/Edit "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Edit Company</h3>
                                </div>
                            </div>
                            <select name="companyId" id="companyId" class="form-control">
                            <option value="0">Choose Company</option>
                            <?php foreach($companyList as $company){?>
                                <option value="<?php echo $company->getCompanyId()?>"><?php echo $company->getCompanyName()?></option>
                          <?php  } ?>
                            </select>
                            <br>
                            <div class="form-group form-primary"> <input autocomplete="off" type="text" class="form-control" name="companyName" placeholder="Company Name" value="" id="companyName" required> </div>
                            <div class="form-group form-primary"> <input  autocomplete="off"type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" value="" id="phoneNumber" required> </div>
                            <div class="form-group form-primary"> <input autocomplete="off" type="number" class="form-control" name="cuit" placeholder="Cuit" value="" id="cuit" pattern="[0-9]{11}" required> </div>
                            <div class="form-group form-primary"> <input  autocomplete="off"type="email" class="form-control" name="email" placeholder="Email" value="" id="email" required> </div>
                            
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Edit Company"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
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