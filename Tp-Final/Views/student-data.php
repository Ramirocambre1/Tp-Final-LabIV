<?php

require_once("validate-session.php");
$student=$_SESSION['loggedStudent']

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
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Menu</a>
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
			</ul>
		</div>
	</div>
</nav>
<div class="main">
<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="card w-100">
        <div class="card-header header-elements-inline">
            <h5 class="card-title mt-2"></h5>
            <div class="header-elements">
                <div class="list-icons text-muted font-weight-light"> <a class="list-icons-item" data-action="collapse" data-abc="true"><i class="fa fa-minus font-weight-light"></i></a> <a class="list-icons-item" data-action="reload" data-abc="true"><i class="fa fa-refresh"></i></a> <a class="list-icons-item" data-action="remove" data-abc="true"><i class="fa fa-close"></i></a> </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Carrer Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Dni</th>
                        <th>File Number</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Active</th>
                       
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td><?php echo $student->getStudentId() ?></td>
                        <td><?php echo $student->getCareerId() ?></td>
                        <td><?php echo $student->getFirstName() ?></td>
                        <td><?php echo $student->getLastName() ?></td>
                        <td><?php echo $student->getDni() ?></td>
                        <td><?php echo $student->getFileNumber() ?></td>
                        <td><?php echo $student->getGender() ?></td>
                        <td><?php echo $student->getBirthDate() ?></td>
                        <td><?php echo $student->getEmail() ?></td>
                        <td><?php echo $student->getPhoneNumber() ?></td>
                        <td><?php echo $student->getActive() ?></td>

                         </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</body>

