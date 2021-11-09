<?php
    namespace Controllers;

    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\JobOffer as JobOffer;
    use Models\JobPosition as JobPosition;
    use DAO\JobPositionDAO as JobPositionDAO;

   

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

        public function Add($jobPositionId,$studentId)
        {
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
                $this->jobOfferDAO->Add($jobOffer);

                $this->ShowAddView();
            }

            
        }
    }
?>