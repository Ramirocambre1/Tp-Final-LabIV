<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ICareerDAO as ICareerDAO;
    use Models\Career as Career;    
    use DAO\Connection as Connection;

    class CareerDAO implements ICareerDAO
    {
        private $connection;
        private $tableName = "Career";

        public function Add(Career $career)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (careerId,description,active) VALUES (:careerId, :description, :active);";
                
                $parameters["careerId"] = $career->getCareerId();
                $parameters["description"] = $career->getDescription();
                $parameters["active"] = $career->getActive();
                

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
                $careerList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $career = new Career();
                    $career->setCareerId($row["careerId"]);
                    $career->setDescription($row["description"]);
                    $career->setActive($row["active"]);
                         
                    array_push($careerList, $career);
                }

                return $careerList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>