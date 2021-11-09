<?php
    namespace Controllers;

    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career;

    class CareerController
    {
        private $careerDAO;

        public function __construct()
        {
            $this->careerDAO = new CareerDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."career-add.php");
        }

        public function ShowListView()
        {
            $careerList = $this->careerDAO->GetAll();

            require_once(VIEWS_PATH."career-list.php");
        }

        public function Add($recordId, $description, $active)
        {
            $career = new Career();
            $career->setCareerId($recordId);
            $career->setDescription($description);
            $career->setActive($active);

            $this->careerDAO->Add($career);

            $this->ShowAddView();
        }
    }
?>