<?php

namespace Controllers;


use DAO\JobOfferDAO as JobOfferDAO;
use Models\JobOffer as JobOffer;   
use DAO\CareerDAO as CareerDAO;
use Models\Career as Career; 
use DAO\JobPositionDAO as JobPositionDAO;
use models\JobPosition as Jobposition;
use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;



    class JobOfferController{


        private $jobOfferDAO;
        private $careerDAO;
        private $jobPositionDAO;

        public function __construct()
        {
            $this->jobOfferDAO = new JobOfferDAO();
            $this->careerDAO = new CareerDAO();
            $this->jobPositionDAO = new JobPositionDAO();
            $this->companyDAO = new CompanyDAO();
            
        }

        public function ShowEditView()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."joboffer-edit.php");
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            $careerList= $this->careerDAO->GetAll();
            $jobPositionList= $this->jobPositionDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."joboffer-add.php");
        }

        public function ShowListViewAdmin()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $careerList=$this->careerDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."joboffer-list.php");
        }

        public function ShowListViewUser()
        {
            $jobOfferList = $this->jobOfferDAO->GetAll();
            $jobPositionList=$this->jobPositionDAO->GetAll();
            $careerList=$this->careerDAO->GetAll();
            $companyList= $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."joboffer-list-user.php");

        }



        
        public function Add($jobPositionId,$companyId,$description)
        {
            $jobOffer = new JobOffer();
           
            $jobOffer->setJobPositionId($jobPositionId);
            $jobOffer->setCompanyId($companyId);
            $jobOffer->setDescription($description);

             $this->jobOfferDAO->Add($jobOffer);

             echo '<script type="text/javascript">';
             echo ' alert("Job Offer Successfully added.")';  //not showing an alert box.
             echo '</script>';

             $this->ShowAddView();
           
     
        }

        public function Remove($jobOfferId)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->jobOfferDAO->Remove($jobOfferId);

            $this->ShowListViewAdmin();
        }

        public function Edit($jobPositionId,$description)
        {   
            $jobOffer = new JobOffer();
            $jobOffer->setJobOfferId($jobPositionId);
            $jobOffer->setDescription($description);
             $this->jobOfferDAO->Edit($jobOffer);

            $this->ShowListViewAdmin();
        }

}






?>