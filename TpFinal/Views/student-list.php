<?php

require_once("validate-session.php");
$student=$_SESSION['loggedUser'];
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Carrer </th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Dni</th>
                        <th>File Number</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>Phone Number</th>  
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                        foreach($studentList as $student2=>$valuesArray)
                        {
                            if($student->getEmail()==$valuesArray->getEmail())
                            {
                                foreach($careerList as $career=>$valuesArray2)
                                {
                                    if($valuesArray->getCareerId()==$valuesArray2->getCareerId())
                                    {
                            ?>
                                        <td><?php echo $valuesArray2->getDescription() ?></td>
                                        <td><?php echo $valuesArray->getFirstName() ?></td>
                                        <td><?php echo $valuesArray->getLastName() ?></td>
                                        <td><?php echo $valuesArray->getDni() ?></td>
                                        <td><?php echo $valuesArray->getFileNumber() ?></td>
                                        <td><?php echo $valuesArray->getGender() ?></td>
                                        <td><?php echo $valuesArray->getBirthDate() ?></td>
                                        <td><?php echo $valuesArray->getEmail() ?></td>
                                        <td><?php echo $valuesArray->getPhoneNumber() ?></td>
                            <?php
                                    }
                                }
                        }   }
                     ?> 

                         </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</body>