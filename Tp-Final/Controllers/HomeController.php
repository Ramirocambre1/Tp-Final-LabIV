<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class HomeController
    {   
        private $studentDAO;


        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
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

        public function Login($email)
        {
            $student = $this->studentDAO->GetByEmail($email);

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
                
        }
        
        public function Logout()
        {
            session_destroy();
            
    

            $this->Index();
        }

    }
?>