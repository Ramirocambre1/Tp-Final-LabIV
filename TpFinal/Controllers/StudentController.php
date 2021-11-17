<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Models\User as User;
    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career; 

    class StudentController
    {
        
        private $studentDAO;

        public function __construct()
        {
            
            $this->studentDAO = new StudentDAO();
            $this->careerDAO = new CareerDAO();

        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."user-add.php");
            
        }

        public function ShowListView()
        {
            
            $userList = $this->userDAO->getAll();
            
            
        }

        

       
    }
?>