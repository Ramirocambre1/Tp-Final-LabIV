<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;    
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "User";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (email,password) VALUES (:email, :password);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
               
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
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                         
                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            $user = null;

            $query = "CALL User_GetByEmail(?)";

            $parameters["email"] = $email;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

            foreach($results as $row)
            {
                $user = new User();
                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
            }

            return $user;
        }

        public function AddSignUp(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (email,password) VALUES (:email, :password);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
               
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }


        }

    }
?>