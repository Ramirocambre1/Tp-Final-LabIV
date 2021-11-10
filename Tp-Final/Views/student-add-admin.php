<?php
    require_once('validate-session-admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>sidebar.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>addStudent.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div id="navbar-wrapper">
<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Admin Menu</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
            <li ><a href="<?php echo FRONT_ROOT ?>Home/ShowAddViewAdmin">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Student/ShowlistViewAdmin">StudentList<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Student/ShowAddViewAdmin">New Student<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobPosition/ShowAddView">New Job Application<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobPosition/ShowListViewAdmin">List Jobs <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowAddView"">Add New Company<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-ok"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowListView"">Company List<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewAdmin">List Jobs Applications <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Home/Logout">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form autocomplete="off" class="md-float-material form-material" action="<?php echo  FRONT_ROOT."Student/Add "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Add New Student</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary"> <select name="careerId" id="careerId" class="form-control"> </div>
                                                                    <option value="0">Choose Career Id</option>
                                                                    <?php foreach($careerList as $career){ ?>
                                                                        <option value="<?php echo $career->getCareerId()?>"><?php echo $career->getDescription()?></option>
                                                                        <?php } ?>
                                                                    </select>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="firstName" placeholder="First Name" value="" id="firstName" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="" id="lastName" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="dni" placeholder="Dni" value="" id="dni" pattern="[0-9]{8}" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="fileNumber" placeholder="File Number" value="" id="fileNumber" pattern="[0-9]+"  required> </div>
                            <div class="form-group form-primary"> <select name="gender" id="gender" class="form-controll"><option value="0">Choose Gender</option><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option><option value="Polygender">Polygender</option><option value="BiGender">BiGender</option><option value="GenderFluid">GenderFluid</option><option value="Non-Binary">Non-Binary</option><option value="Genderqueer">Genderqueer</option><option value="Agender">Agender</option>  </select> </div>
                            <div class="form-group form-primary"> <input type="date" class="form-control" name="birthDate" placeholder="Birth Date" value="" id="birthDate" required> </div>
                            <div class="form-group form-primary"> <input type="email" class="form-control" name="email" placeholder="Email" value="" id="email" required> </div>
                            <div class="form-group form-primary"> <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" value="" id="phoneNumber" pattern="[0-9]+"  required> </div>
                            <div class="form-group form-primary"> <input type="number" class="form-control" name="active" placeholder="Active" value="" id="active" required pattern="[0-1]+"></div>
                        

                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Add Student"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
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