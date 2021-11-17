<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Models\User as User;

    class UserController
    {
        private $userDAO;
        private $studentDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->studentDAO = new StudentDAO();

        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."user-add.php");
            
        }

        public function ShowListView()
        {
            
            $userList = $this->userDAO->getAll();
            
            require_once(VIEWS_PATH."cellphone-list.php");
        }

        public function ShowSignUpView()
        {
            require_once(VIEWS_PATH."sign-up.php");


        }

        public function Add($email, $password)
        {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            $studentList=$this->studentDAO->GetAll();
            $userList=$this->userDAO->GetAll();
            $studentExist=NULL;
            $userExist=NULL;

            foreach($studentList as $studen=>$valuesArray)
            {
                if($user->getEmail()==$valuesArray->getEmail())
                {
                    $studentExist=true;
                   if($studentExist=true)
                   {

                    foreach($userList as $user2 => $valuesArray)
                    {
                        if($user->getEmail() == $valuesArray->getEmail())
                        {
                            $userExist=true;
                        }
                        else
                        {
                            $userExist=false;
                        }
                    }
                    if($userExist==true)
                    {
                        echo '<script type="text/javascript">';
                        echo ' alert("The User already exists, please try again.")';  //not showing an alert box.
                        echo '</script>';
                        $this->ShowAddView();
                    }
                    else if($userExist==false)
                    {
                        echo '<script type="text/javascript">';
                        echo ' alert("Successful registration.")';  //not showing an alert box.
                        echo '</script>';
                        $this->userDAO->AddSignUp($user);
                   
        
                        $this->ShowAddView();
                    }
                   }
                }
                else
                {
                    $studentExist=false;
                }

            }
        }

        public function AddSignUp($email, $password)
        {
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            $studentList=$this->studentDAO->GetAll();
            $userList=$this->userDAO->GetAll();
            $studentExist=NULL;
            $userExist=NULL;

            foreach($studentList as $studen=>$valuesArray)
            {
                if($user->getEmail()==$valuesArray->getEmail())
                {
                    $studentExist=true;
                   if($studentExist=true)
                   {

                    foreach($userList as $user2 => $valuesArray)
                    {
                        if($user->getEmail() == $valuesArray->getEmail())
                        {
                            $userExist=true;
                        }
                        else
                        {
                            $userExist=false;
                        }
                    }
                    if($userExist==true)
                    {
                        echo '<script type="text/javascript">';
                        echo ' alert("The User already exists, please try again.")';  //not showing an alert box.
                        echo '</script>';
                        $this->ShowSignUpView();
                    }
                    else if($userExist==false)
                    {
                        echo '<script type="text/javascript">';
                        echo ' alert("Successful registration.")';  //not showing an alert box.
                        echo '</script>';
                        $this->userDAO->Add($user);
                   
        
                        $this->ShowSignUpView();
                    }
                   }
                }
                else
                {
                    $studentExist=false;
                }

            }
        }


       
    }
?>