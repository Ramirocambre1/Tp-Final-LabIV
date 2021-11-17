<?php

     namespace DAO;

     use Models\Student as Student;
     use DAO\Connection as Connection;
     use DAO\IStudentDAO as IStudentDAO;

     class StudentDAO implements IStudentDAO
     {
        private $studentList = array();
        private $filname;

        public function Add(Student $student)
        {

        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }

        private function RetrieveData()
        {
            $this->studentList = array();

            $opt = array(
                "http" => array(
                  "method" => "GET",
                  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                )
              );

              $ctx = stream_context_create($opt);

             

           

                $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/Student", false, $ctx);

                

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setStudentId($valuesArray["studentId"]);
                    $student->setCareerId($valuesArray["careerId"]);
                    $student->setFirstName($valuesArray["firstName"]);
                    $student->setLastName($valuesArray["lastName"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthDate"]);
                    $student->setEmail($valuesArray["email"]);
                    $student->setPhoneNumber($valuesArray["phoneNumber"]);
                    $student->setActive($valuesArray["active"]);
              



                    array_push($this->studentList, $student);
                }
            
        }

     }

     
  

?>