<?php
    namespace DAO;

    use DAO\ICareerDAO as ICareerDAO;
    use Models\Career;


    class CareerDAO implements ICareerDAO
    {        
        private $careerList = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/students.json";
        }

        public function Add(Career $career)
        {
            $this->RetrieveData();
            
            array_push($this->careerList, $career);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->careerList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->careerList as $career)
            {
                $valuesArray["careerId"] = $career->getCareerId();
                $valuesArray["description"] = $career->getDescription();
                $valuesArray["active"] = $career->getActive();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->careerList = array();

            $opt = array(
                "http" => array(
                  "method" => "GET",
                  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                )
              );

              $ctx = stream_context_create($opt);

              

           

                $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);

                

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $career = new Career();
                    $career->setCareerId($valuesArray["careerId"]);
                    $career->setDescription($valuesArray["description"]);
                    $career->setActive($valuesArray["active"]);

                    array_push($this->careerList, $career);
                }
            
        }
    }
?>