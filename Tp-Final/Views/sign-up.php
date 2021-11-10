<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>sidebar.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>addStudent.css">
    <title>Registration Form</title>
</head>
<body>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="<?php echo  FRONT_ROOT."Student/AddStudent "?>" method="POST" autocomplete="off">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Register</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary"> <select name="careerId" id="careerId" class="form-control"> </div>
                                                                    <option value="0">Choose Career Id</option>
                                                                    <?php foreach($careerList as $career){ ?>
                                                                        <option value="<?php echo $career->getCareerId()?>"><?php echo $career->getDescription()?></option>
                                                                        <?php } ?>
                                                                    </select>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="firstName" placeholder="First Name" value="" id="firstName" required > </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="" id="lastName" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="dni" placeholder="Dni" value="" id="dni" pattern="[0-9]{8}" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="fileNumber" placeholder="File Number" value="" id="fileNumber" pattern="[0-9]+"  required> </div>
                            <div class="form-group form-primary"> <select name="gender" id="gender" class="form-controll"><option value="0">Choose Gender</option><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option><option value="Polygender">Polygender</option><option value="BiGender">BiGender</option><option value="GenderFluid">GenderFluid</option><option value="Non-Binary">Non-Binary</option><option value="Genderqueer">Genderqueer</option><option value="Agender">Agender</option>  </select> </div>
                            <div class="form-group form-primary"> <input type="date" class="form-control" name="birthDate" placeholder="Birth Date" value="" id="birthDate" required> </div>
                            <div class="form-group form-primary"> <input type="email" class="form-control" name="email" placeholder="Email" value="" id="email" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" value="" id="phoneNumber" pattern="[0-9]+"  required> </div>
                            <div class="form-group form-primary"> <input type="number" class="form-control" name="active" placeholder="Active" value="" id="active" required pattern="[0-1]+"></div>
                        

                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Add Student">
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