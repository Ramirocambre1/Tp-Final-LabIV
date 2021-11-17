<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserAdminDAO as IUserAdminDAO;
    use Models\UserAdmin as UserAdmin;    
    use DAO\Connection as Connection;

    class UserAdminDAO implements IUserAdminDAO
    {
        private $connection;
        private $tableName = "UserAdmin";

        public function Add(UserAdmin $user)
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
                $userAdminList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new UserAdmin();
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                         
                    array_push($userAdminList, $user);
                }

                return $userAdminList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            $user = null;

            $query = "CALL UserAdmin_GetByEmail(?)";

            $parameters["email"] = $email;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

            foreach($results as $row)
            {
                $user = new UserAdmin();
                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
            }

            return $user;
        }  

    }
?>