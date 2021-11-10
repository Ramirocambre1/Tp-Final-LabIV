<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class HomeController
    {   
        private $studentDAO;
        private $companyDAO;


        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->companyDAO = new CompanyDAO();
        }

        public function Index($message = "")
        {
            
            require_once(VIEWS_PATH."login.php");
        }   
        
        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."student-info.php");
        }

        public function ShowAddViewAdmin()
        {

            
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."admin-menu.php");
        }

        public function ShowAddViewCompany()
        {
            require_once(VIEWS_PATH."validate-session-company.php");
            require_once(VIEWS_PATH."company-menu.php");

        }

        public function Login($email)
        {
            $student = $this->studentDAO->GetByEmail($email);
            $company= $this->companyDAO->GetByEmail($email);

            if(($student != null) && ($student->getEmail() === $email))
            {
                $_SESSION["loggedStudent"] = $student;
                $this->ShowAddView();
            }
            else if($email== "admin@utn.com")
            {
                $_SESSION["loggedAdmin"] ="admin@utn.com";
                $this->ShowAddViewAdmin();
            }
            else if($company!=NULL && $company->getEmail() == $email)
            {
                $_SESSION["loggedCompany"] = $company;
                $this->ShowAddViewCompany();
            }
            else
            {
                echo '<script type="text/javascript">';
                echo ' alert("The User does not exist.")';  //not showing an alert box.
                echo '</script>';
                $this->Index();

            }
                
        }
        
        public function Logout()
        {
            session_destroy();
            
    

            $this->Index();
        }

    }
?>