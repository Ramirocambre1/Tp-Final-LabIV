<?php
require_once("validate-session.php");



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
<div id="navbar-wrapper" >
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
				<li ><a href="<?php echo FRONT_ROOT ?>UserAdmin/ShowAddView">Add New Admin<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>User/ShowAddView">Add New Student User<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView">Add New Job Offer<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewAdmin">List Job Offers <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowAddView"">Add New Company<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-ok"></span></a></li>
				<li ><a href="<?php echo FRONT_ROOT ?>Company/ShowListView"">Company List<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
				<li><a href="<?php echo FRONT_ROOT ?>JobApplication/ShowApplicationViewAdmin">List Jobs Applications <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
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
                        <th>Company Name</th>
                        <th>Phone Number</th>
                        <th>Cuit</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     foreach($companyList as $company)
                              {
                                 ?>
                                     <tr>
                                        <td><?php echo $company->getCompanyName() ?></td>
                                         <td><?php echo $company->getPhoneNumber() ?></td>
                                         <td><?php echo $company->getCuit() ?></td>
                                         <td><?php echo $company->getEmail()?></td>
                                         <td></td>
                                         <td>
                                         <button type="submit" name="companyId" class="btn-danger" value="<?php echo $company->getCompanyId() ?>"> Remove </button>
                                        
                                        </td>
                                            
                                    </tr>
                                <?php
                            }
                            
                        ?>

                        <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>Company/ShowEditView" role="button">Edit</a>
                    </tr>
                </tbody>
            </table></form>
        </div>
    </div>
</div>




 </body>