<?php

require_once(VIEWS_PATH."validate-session-admin.php");

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
			<a class="navbar-brand" href="#">Admin Menu</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo FRONT_ROOT ?>Home/ShowAddViewAdmin">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Student/ShowlistViewAdmin">StudentList<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Student/ShowAddViewAdmin">New Student<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobPosition/ShowAddView">New Job Application<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobPosition/ShowListViewAdmin">List Job Applications<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowAddView"">Add New Company<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-ok"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowListView"">Company List<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Home/Logout">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
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
        <form action="<?php echo FRONT_ROOT."Company/Remove"?>"" method="">    
            <table class="table">
                <thead>
                    <tr>
                        <th>Company Id</th>
                        <th>Job Position Id</th>
                        <th>Company Name</th>
                        <th>Description</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     foreach($companyList as $company)
                              {
                                 ?>
                                     <tr>
                                         <td><?php echo $company->getCompanyId() ?></td>
                                        <td><?php echo $company->getJobPositionId() ?></td>
                                         <td><?php echo $company->getCompanyName() ?></td>
                                         <td><?php echo $company->getDescription() ?></td>
                                         <td></td>
                                         <td>
                                         <button type="submit" name="companyId" class="btn-danger" value="<?php echo $company->getCompanyId() ?>"> Remove </button>
                                         <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>Company/ShowEditView" role="button">Edit</a>
                                        </td>
                                            
                                    </tr>
                                <?php
                            }
                        ?>
                    </tr>
                </tbody>
            </table></form>
        </div>
    </div>
</div>




 </body>