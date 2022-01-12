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
        <form action="<?php echo FRONT_ROOT."JobOffer/Remove"?>"" method="">    
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Career</th>
                        <th>Company</th>
                        <th>JobPosition</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     foreach($jobOfferList as $jobOffer =>$valuesArray)
                              {
                                  foreach($jobPositionList as $jobPosition=>$valuesArray2){

                                    if($valuesArray->getJobPositionId()==$valuesArray2->getJobPositionId())
                                    { 
                                        foreach($careerList as $career=>$valuesArray3)
                                        {
                                            if($valuesArray3->getCareerId()==$valuesArray2->getCareerId())
                                            {
                                                foreach($companyList as $company=>$valuesArray4)
                                                {   
                                                    if($valuesArray4->getCompanyId()==$valuesArray->getCompanyId())
                                                        {
                                 ?>
                                     <tr>
                                         <td><?php echo $valuesArray->getJobOfferId() ?></td>
                                         <td><?php echo $valuesArray3->getDescription()  ?></td>
                                         <td><?php echo $valuesArray4->getCompanyName() ?></td>
                                         <td><?php echo $valuesArray2->getDescription() ?></td>
                                         <td><?php echo $valuesArray->getDescription()?></td>
                                         <td></td>
                                         <td>
                                         
                                         <button type="submit" name="jobOfferId" class="btn-danger" value="<?php echo $valuesArray->getJobOfferId() ?>"> Remove </button>
                                        </td>
                                            
                                    </tr>
                                <?php           
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                            
                        ?>

                        <a class="btn btn-success" href="<?php echo FRONT_ROOT ?>JobOffer/ShowEditView" role="button">Edit</a>
                    </tr>
                </tbody>
            </table></form>
        </div>
    </div>
</div>




 </body>