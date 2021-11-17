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
                $query = "CALL Company_Add(?,?,?,?)";
                $parameters["companyName"] = $company->getCompanyName();
                $parameters["phonenumber"] = $company->getPhoneNumber();
                $parameters["cuit"] = $company->getCuit();
                $parameters["email"] = $company->getEmail();

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
                    $company->setPhoneNumber($row["phoneNumber"]);
                    $company->setCompanyName($row["companyName"]);
                    $company->setCuit($row["cuit"]);
                    $company->setEmail($row["email"]);
                    
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
            
            $query = "CALL Company_Update(?,?,?,?,?)";

                $parameters["companyId"] = $company->getCompanyId();
                $parameters["companyName"] = $company->getCompanyName();
                $parameters["phoneNumber"] = $company->getPhoneNumber();
                $parameters["cuit"] = $company->getCuit();
                $parameters["email"] = $company->getEmail();
                

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }
        
      
        public function GetByEmail($email)
        {
            $company = null;

            $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email)";

            $parameters["email"] = $email;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters);

            foreach($results as $row)
            {
                $company = new Company();
                $company->setCompanyId($row["companyId"]);
                $company->setPhoneNumber($row["phoneNumber"]);
                $company->setCompanyName($row["companyName"]);
                $company->setCuit($row["cuit"]);
                $company->setEmail($row["email"]);
                
            }

            return $company;
        }

        public function GetCompanyByName($companyName)
        {
            $company=null;
            $companyList=array();
            $query= "CALL Company_GetByName(?)";

            $parameters["companyName"] = $companyName;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

            foreach($results as $row)
            {
                
                $company = new Company();
                $company->setCompanyId($row["companyId"]);
                $company->setCompanyName($row['companyName']);
                $company->setPhoneNumber($row['phoneNumber']);
                $company->setCuit($row['cuit']);
                $company->setEmail($row['email']);
                array_push($companyList,$company);
            }

            return $companyList;
        
        }

    }
?>