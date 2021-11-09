<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ICompanyDAO as ICompanyDAO;
    use Models\Company as Company;    
    use DAO\Connection as Connection;

    class CompanyDAO implements ICompanyDAO
    {
        private $connection;
        private $tableName = "Company";

        public function Add(Company $company)
        {
            try
            {
                $query = "CALL Company_Add(?,?,?)";
                $parameters["jobPositionId"] = $company->getJobPositionId();
                $parameters["companyName"] = $company->getCompanyName();
                $parameters["description"] = $company->getDescription();
                

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
                $companyList = array();

                $query = "CALL Company_GetAll()";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
                
                foreach ($resultSet as $row)
                {                
                    $company = new Company();
                    $company->setCompanyId($row["companyId"]);
                    $company->setJobPositionId($row["jobPositionId"]);
                    $company->setCompanyName($row["companyName"]);
                    $company->setDescription($row["description"]);
                    
                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($companyId)
        {            
            $query = "CALL Company_Delete(?)";

            $parameters["companyId"] =  $companyId;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }   
        
        
        public function Edit(Company $company)
        {
            
            $query = "CALL Company_Update(?,?,?,?)";

                $parameters["companyId"] = $company->getCompanyId();
                $parameters["jobPositionId"] = $company->getJobPositionId();
                $parameters["companyName"] = $company->getCompanyName();
                $parameters["description"] = $company->getDescription();
                

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }
        
    }
?>