<?php
    namespace Controllers;

    use DAO\UserAdminDAO as UserAdminDAO;
    use Models\UserAdmin as UserAdmin;

    class UserAdminController
    {
        private $userAdminDAO;

        public function __construct()
        {
            $this->userAdminDAO = new UserAdminDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."admin-add.php");
        }

        public function ShowListView()
        {
            
     
            
        }

        public function Add($email, $password)
        {
            
            $user = new UserAdmin();
            $user->setEmail($email);
            $user->setPassword($password);

            $userAdminList=$this->userAdminDAO->GetAll();
           
       

            $userExist=NULL;
            

            foreach($userAdminList as $user2 => $valuesArray)
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
                $this->userAdminDAO->Add($user);
           

                $this->ShowAddView();
            }
        }

       
    }
?>