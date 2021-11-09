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
                $query = "CALL JobOffer_Add(?,?)";;
                $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
                $parameters["studentId"] = $jobOffer->getStudentId();
                

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

                $query = "CALL JobOffer_GetAll()";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
                
                foreach ($resultSet as $row)
                {                
                    $jobOffer = new JobOffer();
                    $jobOffer->setJobOfferId($row["jobOfferId"]);
                    $jobOffer->setJobPositionId($row["jobPositionId"]);
                    $jobOffer->setStudentId($row["studentId"]);
                    array_push($jobOfferList, $jobOffer);
                }

                return $jobOfferList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

       
    }
?>