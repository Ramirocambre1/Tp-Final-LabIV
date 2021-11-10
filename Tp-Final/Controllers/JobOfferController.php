<?php
    namespace Controllers;

    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\JobOffer as JobOffer;
    use Models\JobPosition as JobPosition;
    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\Email as Email;

   

    class JobOfferController
    {
        private $jobOfferDAO;
        private $jobPositionDAO;

        public function __construct()
        {
            $this->jobOfferDAO = new JobOfferDAO();
            $this->jobPositionDAO = new JobPositionDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            $jobList = $this->jobPositionDAO->GetAll();
            require_once(VIEWS_PATH."job-offer-add.php");
    
        }

        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $jobList = $this->jobPositionDAO->GetAll();
            $jobOfferList = $this->jobOfferDAO->GetAll();

            
          require_once(VIEWS_PATH."job-offer-list.php");
     
        }

        public function ShowListViewAdmin()
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            
            $jobList = $this->jobPositionDAO->GetAll();
            $jobOfferList = $this->jobOfferDAO->GetAll();

           
        

            
          require_once(VIEWS_PATH."job-offer-list-admin.php");
     
        }

        public function Add($jobPositionId,$studentId)
        {
            $email=New Email();
            $student=$_SESSION['loggedStudent'];
            $jobOffer = new JobOffer();
            $studentId= $student->getStudentId();
            $jobOffer->setJobPositionId($jobPositionId);
            $jobOffer->setStudentId($studentId);

            $jobOfferList = $this->jobOfferDAO->GetAll();
            $studentExist=NULL;

            foreach($jobOfferList as $jobOffer2 => $valuesArray)
            {
                if($jobOffer->getStudentId()==$valuesArray->getStudentId())
                {
                    $studentExist=true;

                }
                else
                {
                    $studentExist = false;
                }

            }

            if($studentExist==true)
            {
                echo '<script type="text/javascript">';
                echo ' alert("You already applied for a Job.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowAddView();
            }
            else if($studentExist==false)
            {
                echo '<script type="text/javascript">';
                echo ' alert("You applied to the job offer successfully.")';  //not showing an alert box.
                echo '</script>';

                $studentEmail=$student->getEmail();
                $studentEmail= $student->getEmail();
                $receiver = $studentEmail;
                $subject = "Job Offer";
                $body = "Hello, you applied successfully to the job offer, You will be contacted soon.
                       
                            UTN Administration.";
                $sender = "From:utnuniversidad0@gmail.com";
                if(mail($receiver, $subject, $body, $sender)){
                    
                }else{
                    
                }


                $this->jobOfferDAO->Add($jobOffer);

                $this->ShowAddView();
            }

            
        }
    }
?>