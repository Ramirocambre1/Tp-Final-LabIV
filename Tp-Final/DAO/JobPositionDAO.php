<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IJobPositionDAO as IJobPositionDAO;
    use Models\JobPosition as JobPosition;   
    use Models\Company as Company; 
    use DAO\Connection as Connection;

    class JobPositionDAO implements IJobPositionDAO
    {
        private $connection;
        private $tableName = "JobPosition";

        public function Add(JobPosition $jobposition)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (careerId,description) VALUES (:careerId,:description);";
                
                
                $parameters["careerId"] = $jobposition->getCareerId();
                $parameters["description"] = $jobposition->getDescription();
                

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
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
                $jobList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $jobposition = new JobPosition();
                    $jobposition->setJobPositionId($row["jobPositionId"]);
                    $jobposition->setCareerId($row["careerId"]);
                    $jobposition->setDescription($row["description"]);
                         
                    array_push($jobList, $jobposition);
                }

                return $jobList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function GetByCareer()
        {
            try
            {
                $jobList = array();

                $query = "CALL JobPosition_GetJobs2()";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
                
                
                foreach ($resultSet as $row)
                {                
                    $jobposition = new JobPosition();
                    $jobposition->setJobPositionId($row["jobPositionId"]);
                    $jobposition->setCareerId($row["careerId"]);
                    $jobposition->setDescription($row["description"]);
                         
                    array_push($jobList, $jobposition);
                }

                return $jobList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        
        public function GetJobById($jobPositionId)
        {
            $id = null;

            $jobList=array();

            $query= "CALL JobPosition_GetJobs2(?)";

            $parameters["jobPositionId"] = $jobPositionId;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

            foreach($results as $row)
            {
                $jobposition= new JobPosition();
                $jobposition->setJobPositionId($row["jobPositionId"]);
                $jobposition->setCareerId($row["careerId"]);
                $jobposition->setDescription($row["description"]);

                array_push($jobList, $jobposition);
                
            }

            return $jobList;
        
        }

        public function Remove($jobPositionId)
        {            
            $query = "CALL JobPosition_Delete(?)";

            $parameters["jobPositionId"] =  $jobPositionId;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }   

        public function Edit(JobPosition $jobposition)
        {
            
            $query = "CALL JobPosition_Update(?,?,?)";

                $parameters["jobPositionId"] = $jobposition->getJobPositionId();
                $parameters["careerId"] = $jobposition->getCareerId();
                $parameters["description"] = $jobposition->getDescription();
                

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }

        public function GetJobById2($jobPositionId)
        {
            $id = null;

            $jobList=array();

            $query= "CALL Jobsall(?)";

            $parameters["jobPositionId"] = $jobPositionId;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

            foreach($results as $row)
            {
                $jobposition= new JobPosition();
                $company = new Company();
                $company->setCompanyId($row["companyId"]);
                $company->setCompanyName($row['companyName']);
                $jobposition->setJobPositionId($row["jobPositionId"]);
                $jobposition->setCareerId($row["careerId"]);
                $jobposition->setDescription($row["description"]);

                array_push($jobList,$company,$jobposition);
                
            }

            return $jobList;
        
        }
        
    }
?>