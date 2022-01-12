<?php

require_once("validate-session.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>sidebar.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>addView.css">
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
			<a class="navbar-brand" href="#"> Student Menu</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
                <li ><a href="<?php echo FRONT_ROOT ?>Home/ShowStudentView">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li ><a href="<?php echo FRONT_ROOT ?>Company/ShowListViewUser">Companies List<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewUser">Job Offers list<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list "></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>JobApplication/ShowApplicationViewUser">Job Applied<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
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
                <form autocomplete="off" class="md-float-material form-material" action="<?php echo  FRONT_ROOT."JobApplication/Add "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Chose The JobOffer Number</h3>
                                </div>
                            </div>

                            <br>
                            <div class="form-group form-primary"> <select name="jobOfferId" id="jobOfferId" class="form-control"> </div>
                                                                    <option value="0">Choose Job Offer Number</option>
                                                                    <?php foreach($jobOfferList as $jobOffer){ ?>
                                                                        <option value="<?php echo $jobOffer->getJobOfferId()?>"><?php echo $jobOffer->getJobOfferId()?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <br>
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" > <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
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