<?php
    namespace Controllers;

    use DAO\UserAdminDAO as UserAdminDAO;
    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\UserAdmin as UserAdmin;
    use DAO\StudentDAO as StudentDAO;
    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career; 

    class HomeController
    {
       

        public function __construct()
        {
            $this->userDAO= new UserDAO();
            $this->userAdminDAO = new UserAdminDAO();
            $this->StudentDAO = new StudentDAO();
            $this->careerDAO = new CareerDAO();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowAdminView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."admin-add.php");
           
        }

        public function ShowStudentView()
        {
            $studentList=$this->StudentDAO->GetAll();
            $careerList=$this->careerDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowSignUpView()
        {

            require_once(VIEWS_PATH."sign-up.php");
        }

        

        public function Login($email, $password)
        {
            $user = $this->userDAO->GetByEmail($email);
            $userAdmin = $this->userAdminDAO->GetByEmail($email);

            if(($user != null) && ($user->getPassword() === $password))
            {
                $_SESSION["loggedUser"] = $user;
                $this->ShowStudentView();
            }
            else if(($userAdmin != null) && ($userAdmin->getPassword() === $password))
            {
                $_SESSION["loggedUser"] = $userAdmin;
                $this->ShowAdminView();

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