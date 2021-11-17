<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IJobOfferDAO as IJobOfferDAO;
    use Models\JobOffer as JobOffer;    
    use DAO\Connection as Connection;

    class JobOfferDAO implements IJobOfferDAO
    {
        private $connection;
        private $tableName = "JobOffer";

        public function Add(JobOffer $jobOffer)
        {
            try
            {
                $query = "CALL JobOffer_Add(?,?,?)";
                
                $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
                $parameters["companyId"] = $jobOffer->getCompanyId();
                $parameters["description"] = $jobOffer->getDescription();
               
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
                $jobOfferList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $jobOffer = new JobOffer();
                    $jobOffer->setJobOfferId($row["jobOfferId"]);
                    $jobOffer->setJobPositionId($row["jobPositionId"]);
                    $jobOffer->setCompanyId($row["companyId"]);
                    $jobOffer->setDescription($row["description"]);
                         
                    array_push($jobOfferList, $jobOffer);
                }

                return $jobOfferList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($jobOfferId)
        {
            $query = "CALL JobOffer_Delete(?)";

            $parameters["jobOfferId"] =  $jobOfferId;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }

        public function Edit(JobOffer $jobOffer)
        {
            
            $query = "CALL JobOffer_Update(?,?)";

                $parameters["jobOfferId"] = $jobOffer->getJobOfferId();
                $parameters["description"] = $jobOffer->getDescription();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }
    }
?>
