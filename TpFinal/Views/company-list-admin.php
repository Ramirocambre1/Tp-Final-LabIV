<?php
require_once("validate-session.php");
require_once("nav-admin.php");


?>

<body>
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