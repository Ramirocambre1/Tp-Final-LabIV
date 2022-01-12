<?php

require_once("validate-session.php");
require_once("nav-user.php");


?>

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
        <form autocomplete="false" name="search" action="<?php echo FRONT_ROOT."Company/GetCompanyByName"?>"" method="post">    
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
                   Search: <input type="text" name="search_box" value="">
                    <input type="submit" name="search" value="Search company by name">
                <?php
                     foreach($companyList as $company)
                              {                 
                                 ?>
                                     <tr>
                                        <td><?php echo $company->getCompanyName() ?></td>
                                         <td><?php echo $company->getPhoneNumber() ?></td>
                                         <td><?php echo $company->getCuit() ?></td>
                                         <td><?php echo $company->getEmail()?></td>
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