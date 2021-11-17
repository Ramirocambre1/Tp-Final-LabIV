<?php
    
    namespace DAO;

    use \Exception as Exception;
    use DAO\IJobApplicationDAO as IJobApplicationDAO;
    use Models\JobApplication as JobApplication;    
    use DAO\Connection as Connection;

    class JobApplicationDAO implements IJobApplicationDAO
    {
        private $connection;
        private $tableName = "JobApplication";

        public function Add(JobApplication $jobApplication)
        {
            try
            {
                $query = "CALL JobApplication_Add(?,?)";
                
                $parameters["jobOfferId"] = $jobApplication->getJobOfferId();
                $parameters["studentId"] = $jobApplication->getStudentId();
              
               
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
                $jobApplicationList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $jobApplication = new JobApplication();
                    $jobApplication->setjobApplicationId($row["jobApplicationId"]);
                    $jobApplication->setStudentId($row["studentId"]);
                    $jobApplication->setJobOfferId($row["jobOfferId"]);
                         
                    array_push($jobApplicationList, $jobApplication);
                }

                return $jobApplicationList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

      
    }
?>






