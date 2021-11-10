<?php
    namespace Controllers;

    use DAO\CareerDAO as CareerDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->careerDAO = new CareerDAO();
        }

        public function ShowAddViewAdmin()
        {   
            
            $careerList = $this->careerDAO->GetAll();
            require_once(VIEWS_PATH."student-add-admin.php");
            
        }

        public function ShowSignUpView()
        {
            $careerList = $this->careerDAO->GetAll();
            require_once(VIEWS_PATH."sign-up.php");
        }

        public function ShowListViewUser()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."student-data.php");
        }

        /*
        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."student-list.php");
        }
        */

        public function ShowlistViewAdmin()
        {
            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."student-list.php");

        }

        public function Add($careerId,$firstName,$lastName,$dni,$filenumber,$gender,$birthDate,$email,$phoneNumber,$active)
        {
            $student = new Student();
            $student->setCareerId($careerId);
            $student->setFirstName($firstName);
            $student->setLastName($lastName);
            $student->setDni($dni);
            $student->setFileNumber($filenumber);
            $student->setGender($gender);
            $student->setBirthDate($birthDate);
            $student->setEmail($email);
            $student->setPhoneNumber($phoneNumber);
            $student->setActive($active);

            $studentList=$this->studentDAO->GetAll();
            $studentExist=NULL;

            foreach($studentList as $student2 => $valuesArray)
            {
                if($student->getEmail() == $valuesArray->getEmail() || $student->getDni() == $valuesArray->getDni())
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
                echo ' alert("The student already exists in the database, please try again.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowAddViewAdmin();
            }
            else if($studentExist==false)
            {
                echo '<script type="text/javascript">';
                echo ' alert("Successfully Added Student.")';  //not showing an alert box.
                echo '</script>';
                $this->studentDAO->Add($student);
           

                $this->ShowAddViewAdmin();
            }
            }

           
        public function AddStudent($careerId,$firstName,$lastName,$dni,$filenumber,$gender,$birthDate,$email,$phoneNumber,$active)
        {
            $student = new Student();
            $student->setCareerId($careerId);
            $student->setFirstName($firstName);
            $student->setLastName($lastName);
            $student->setDni($dni);
            $student->setFileNumber($filenumber);
            $student->setGender($gender);
            $student->setBirthDate($birthDate);
            $student->setEmail($email);
            $student->setPhoneNumber($phoneNumber);
            $student->setActive($active);

            $studentList=$this->studentDAO->GetAll();
            $studentExist=NULL;

            foreach($studentList as $student2 => $valuesArray)
            {
                if($student->getEmail() == $valuesArray->getEmail() || $student->getDni() == $valuesArray->getDni() || $student->getFileNumber() == $valuesArray->getFileNumber())
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
                echo ' alert("The student already exists in the database, please try again.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowSignUpView();
            }
            else if($studentExist==false)
            {
                echo '<script type="text/javascript">';
                echo ' alert("Successful registration.")';  //not showing an alert box.
                echo '</script>';
                $this->studentDAO->AddStudent($student);
           

                $this->ShowSignUpView();
            }
        }
    }
?>