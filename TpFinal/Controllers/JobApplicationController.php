<?php


    namespace Controllers;
  

    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\JobOffer as JobOffer;   
    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career; 
    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\JobApplication as JobApplication;
    use DAO\JobApplicationDAO as JobApplicationDAO;
    use DAO\StudentDAO as StudentDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;


    

    class JobApplicationController{


        
        private $jobOfferDAO;
        private $careerDAO;
        private $jobPositionDAO;
        private $jobApplicationDAO;

        public function __construct()
        {
            $this->jobOfferDAO = new JobOfferDAO();
            $this->careerDAO = new CareerDAO();
            $this->jobPositionDAO = new JobPositionDAO();
            $this->jobApplicationDAO = new JobApplicationDAO();
            $this->studentDAO = new StudentDAO();
            $this->companyDAO = new CompanyDAO();
        }
    

        public function ShowAddView()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."jobapplication-add.php");
        }

        public function ShowListViewAdmin()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $careerList=$this->careerDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."joboffer-list.php");
        }

        public function ShowListViewUser()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $careerList=$this->careerDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."joboffer-list-user.php");

        }

        public function ShowApplicationViewAdmin()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $jobApplicationList=$this->jobApplicationDAO->GetAll();
            $studentList=$this->studentDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
        
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."jobapplication-list-admin.php");

        }

        public function ShowApplicationViewUser()
        {

            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $jobApplicationList=$this->jobApplicationDAO->GetAll();
            $studentList=$this->studentDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
        
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."jobapplication-list-user.php");

        }
        
        public function Add($jobOfferId,$studentId)
        {
            $jobApplication = new JobApplication();
            $jobApplication->setJobOfferId($jobOfferId);
            $studentList=$this->studentDAO->GetAll();
            $user=$_SESSION['loggedUser'];
            $jobApplicationList=$this->jobApplicationDAO->GetAll();
            $studentExist=NULL;
         
            foreach($studentList as $student2=>$valuesArray)
            {
                if($user->getEmail()==$valuesArray->getEmail())
                {
                    $jobApplication->setStudentId($valuesArray->getStudentId());
                    
                }
            }
            foreach($jobApplicationList as $jobApplication2 =>$valuesArray)
            {   
                if($jobApplication->getStudentId()==$valuesArray->getStudentId())
                {
                    $studentExist=true;

                }
                else
                {
                    $studentExist=false;
                }
            }

            if($studentExist==true)
            {
                echo '<script type="text/javascript">';
                echo ' alert("You already applied for a Job.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowListViewUser();

            }
            else
            {
                echo '<script type="text/javascript">';
                echo ' alert("You applied to the job offer successfully.")';  //not showing an alert box.
                echo '</script>';
                $this->jobApplicationDAO->Add($jobApplication);
                $this->ShowListViewUser();

            }
        }
    }
?>