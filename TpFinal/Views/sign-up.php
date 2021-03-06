<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>addView.css">
    <title>Registration Form</title>
</head>
<body>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="<?php echo  FRONT_ROOT."User/AddSignUp "?>" method="POST" autocomplete="off">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Register</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary"> <input type="email" class="form-control" name="email" placeholder="Email" value="" id="email" required > </div>
                            <div class="form-group form-primary"> <input type="password" class="form-control" name="password" placeholder="Password" value="" id="password" required> </div>
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Register">
                                <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>Home/Index" role="button">Exit</a>
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
</html>