<?php
    namespace Controllers;

    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\JobPosition as JobPosition;

    class JobPositionController
    {
        private $jobpositionDAO;

        public function __construct()
        {
            $this->jobpositionDAO = new JobPositionDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."job-add.php");
        }

        public function ShowListView()
        {
            $jobList = $this->jobpositionDAO->GetAll();
            
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."job-list.php");
        }
        public function ShowListViewAdmin()
        {
            $jobList = $this->jobpositionDAO->GetAll();
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."job-list-admin.php");
        }

        public function ShowListByCareer()
        {   
            
            
            $jobList = $this->jobpositionDAO->GetAll();
            
            require_once(VIEWS_PATH."validate-session.php");
            

        }

        public function ShowEditView()
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."job-edit.php");

        }

        public function Add($carrerId, $description)
        {
            $jobposition = new JobPosition();
            $jobposition->setCareerId($carrerId);
            $jobposition->setDescription($description);

            $this->jobpositionDAO->Add($jobposition);

            $this->ShowAddView();
        }

        public function JobId($jobPositionId)
        {
            $jobList= $this->jobpositionDAO->GetJobById($jobPositionId);
            if($jobList!=null)
            {   
                require_once(VIEWS_PATH."validate-session.php");
                require_once(VIEWS_PATH."job-list-user.php");
            }
            else
            {
                
                echo '<script type="text/javascript">';
                echo ' alert("That Id doesnt Exist")';  
                echo '</script>';

                require_once(VIEWS_PATH."validate-session.php");
                require_once(VIEWS_PATH."job-list.php");
                
            }
        }

        public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            
            $this->jobpositionDAO->Remove($id);

            $this->ShowListViewAdmin();
        }

        public function Edit($jobPositionId,$careerId,$description)
        {   
            $jobPosition = new JobPosition();
            $jobPosition->setJobPositionId($jobPositionId);
            $jobPosition->setCareerId($careerId);
            $jobPosition->setDescription($description);

            $this->jobpositionDAO->Edit($jobPosition);

            $this->ShowListViewAdmin();
        }

        public function JobId2($jobPositionId)
        {
            $jobList= $this->jobpositionDAO->GetJobById2($jobPositionId);
            if($jobList!=null)
            {   
                require_once(VIEWS_PATH."validate-session.php");
                require_once(VIEWS_PATH."job-list-user.php");
            }
            else
            {
                
                echo '<script type="text/javascript">';
                echo ' alert("That Id doesnt Exist")';  
                echo '</script>';

                require_once(VIEWS_PATH."validate-session.php");
                require_once(VIEWS_PATH."job-list.php");
                
            }
        }

        

        }
        

       

      
    
?>