<?php

require_once(VIEWS_PATH."validate-session.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>sidebar.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div id="navbar-wrapper">
<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#"> Menu</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo FRONT_ROOT ?>Home/ShowAddView">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Student/ShowListViewUser">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>JobPosition/ShowListView">Job list<span style="font-size:16px;" class=""></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView">Apply For Job<span style="font-size:16px;" class=""></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">History<span style="font-size:16px;" class=""></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Home/Logout">Log Out<span style="font-size:16px;" class=""></span></a></li>
		</div>
	</div>
</nav>
<div class="main">
<section class="login-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="<?php echo  FRONT_ROOT."JobPosition/JobId "?>" method="POST">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center heading">Search Jobs By Career Id</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary"> <input type="number" class="form-control" name="careerId" placeholder="Career Id" value="" id="careerId" required> </div>
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Search"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
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