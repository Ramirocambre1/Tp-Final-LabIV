<?php

     namespace DAO;

     use Models\JobPosition as JobPosition;
     use DAO\Connection as Connection;
     use DAO\IJobPositionDAO as IJobPositionDAO;

     class JobPositionDAO implements IJobPositionDAO
     {
        private $jobPositionList = array();
        private $filname;

        public function Add(JobPosition $jobPosition)
        {

        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->jobPositionList;
        }

        private function RetrieveData()
        {
            $this->jobPositionList = array();

            $opt = array(
                "http" => array(
                  "method" => "GET",
                  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                )
              );

              $ctx = stream_context_create($opt);

            

           

                $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/JobPosition", false, $ctx);

               

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $jobPosition = new JobPosition();
                    $jobPosition->setJobPositionId($valuesArray["jobPositionId"]);
                    $jobPosition->setCareerId($valuesArray["careerId"]);
                    $jobPosition->setDescription($valuesArray["description"]);
                    array_push($this->jobPositionList, $jobPosition);
                }
            
        }

     }

     
  

?>