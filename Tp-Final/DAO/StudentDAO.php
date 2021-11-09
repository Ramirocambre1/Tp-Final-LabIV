<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;    
    use DAO\Connection as Connection;

    class StudentDAO implements IStudentDAO
    {
        private $connection;
        private $tableName = "Student";

        public function Add(Student $student)
        {
            try
            {
                $query = "CALL Student_Add(?,?,?,?,?,?,?,?,?,?)";
                $parameters["careerId"] = $student->getCareerId();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["filenumber"] = $student->getFileNumber();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["email"] = $student->getEmail();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["active"] = $student->getActive();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters,QueryType::StoredProcedure);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $studentList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $student = new Student();
                    $student->setStudentId($row["studentId"]);
                    $student->setCareerId($row["careerId"]);
                    $student->setFirstName($row["firstName"]);
                    $student->setLastName($row["lastName"]);
                    $student->setDni($row["dni"]);
                    $student->setFileNumber($row["fileNumber"]);
                    $student->setGender($row["gender"]);
                    $student->setBirthDate($row["birthDate"]);
                    $student->setEmail($row["email"]);
                    $student->setPhoneNumber($row["phoneNumber"]);
                    $student->setActive($row["active"]);
                    

                    array_push($studentList, $student);
                }

                return $studentList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            $student = null;

            $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email)";

            $parameters["email"] = $email;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters);

            foreach($results as $row)
            {
                $student = new Student();
                    $student->setStudentId($row["studentId"]);
                    $student->setCareerId($row["careerId"]);
                    $student->setFirstName($row["firstName"]);
                    $student->setLastName($row["lastName"]);
                    $student->setDni($row["dni"]);
                    $student->setFileNumber($row["fileNumber"]);
                    $student->setGender($row["gender"]);
                    $student->setBirthDate($row["birthDate"]);
                    $student->setEmail($row["email"]);
                    $student->setPhoneNumber($row["phoneNumber"]);
                    $student->setActive($row["active"]);
                
            }

            return $student;
        }  

        public function AddStudent(Student $student)
        {
            try
            {
                $query = "CALL Student_Add(?,?,?,?,?,?,?,?,?,?)";
                $parameters["careerId"] = $student->getCareerId();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["filenumber"] = $student->getFileNumber();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["email"] = $student->getEmail();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["active"] = $student->getActive();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters,QueryType::StoredProcedure);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        
    }
?>