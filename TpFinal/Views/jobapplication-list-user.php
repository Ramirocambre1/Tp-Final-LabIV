<?php
require_once("validate-session.php");
$student2=$_SESSION['loggedUser'];
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
        <form action="" method="">    
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Last Name</th>
						<th>Email</th>
                        <th>Company</th>
                        <th>Job Position</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     foreach($jobApplicationList as $jobApplication =>$valuesArray)
                              {
                                  foreach($jobOfferList as $jobOffer=>$valuesArray2){

                                    if($valuesArray->getJobOfferId()==$valuesArray2->getJobOfferId())
                                    { 
                                        foreach($jobPositionList as $jobPosition=>$valuesArray3)
                                        {
                                            if($valuesArray3->getJobPositionId()==$valuesArray2->getJobPositionId())
                                            {
												foreach($studentList as $student =>$valuesArray4)
												{	
													if($valuesArray4->getStudentId()==$valuesArray->getStudentId())
														{
                                                            foreach($companyList as $company=>$valuesArray5)
                                                            { 
                                                                if($valuesArray5->getCompanyId()==$valuesArray2->getCompanyId())
                                                                 {
                                                                       if($valuesArray4->getEmail()==$student2->getEmail())
                                                                        {
                                 ?>                               
                                     <tr>
                                         <td><?php echo $valuesArray->getJobApplicationId() ?></td>
                                         <td><?php echo $valuesArray4->getFirstName()  ?></td>
                                         <td><?php echo $valuesArray4->getLastName()  ?></td>
										 <td><?php echo $valuesArray4->getEmail()  ?></td>
                                         <td><?php echo $valuesArray5->getCompanyName() ?></td>
                                         <td><?php echo $valuesArray3->getDescription() ?></td>
                                         <td><?php echo $valuesArray2->getDescription()?></td>
                                         <td></td>
                                         <td>
                                         
                                         
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
                                }
                            }
                        }     
                        ?>
                    </tr>
                </tbody>
            </table></form>
        </div>
    </div>
</div>

</body>