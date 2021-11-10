<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class companyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowEditView()
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowListViewUser()
        {   $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."company-list-user.php");

        }

        public function ShowSignUpView()
        {
            require_once(VIEWS_PATH."sign-up-company.php");
        }

        public function ShowCompanyView()
        {
            require_once(VIEWS_PATH."validate-session-company.php");
            require_once(VIEWS_PATH."company-data.php");
        }


        public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session-admin.php");
            
            $this->companyDAO->Remove($id);

            $this->ShowListView();
        }

        public function Edit($companyId,$jobPositionId,$companyName,$description,$cuit,$email)
        {   
            $company = new company();
            $company->setCompanyId($companyId);
            $company->setJobPositionId($jobPositionId);
            $company->setCompanyName($companyName);
            $company->setDescription($description);
            $company->setCuit($cuit);
            $company->setEmail($email);

            

            $this->companyDAO->Edit($company);

            $this->ShowListView();
        }

        public function Add( $jobPositionId, $companyName,$description,$cuit,$email)
        {
            $company = new company();
            $company->setJobPositionId($jobPositionId);
            $company->setCompanyName($companyName);
            $company->setDescription($description);
            $company->setCuit($cuit);
            $company->setEmail($email);

            $companyList = $this->companyDAO->GetAll();
            $companyExist=NULL;

            

            foreach($companyList as $company2 => $valuesArray)
            {
                if($company->getCompanyName()==$valuesArray->getCompanyName() || $company->getCuit()==$valuesArray->getCuit() || $company->getEmail()==$valuesArray->getEmail())
                {
                    $companyExist = true;
                }
                else
                {
                    $companyExist = false;
                }


            }
            

            if($companyExist==true)
            {
                echo '<script type="text/javascript">';
                echo ' alert("The company already exists, please try again.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowAddView();
            }
            else if($companyExist==false)
            {
                echo '<script type="text/javascript">';
                echo ' alert("The company was successfully added.")';  //not showing an alert box.
                echo '</script>';
                $this->companyDAO->Add($company);

                $this->ShowAddView();
            }

          

            
        }

        public function AddCompany( $jobPositionId, $companyName,$description,$cuit,$email)
        {
            $company = new company();
            $company->setJobPositionId($jobPositionId);
            $company->setCompanyName($companyName);
            $company->setDescription($description);
            $company->setCuit($cuit);
            $company->setEmail($email);

            $companyList = $this->companyDAO->GetAll();
            $companyExist=NULL;

            

            foreach($companyList as $company2 => $valuesArray)
            {
                if($company->getCompanyName()==$valuesArray->getCompanyName() || $company->getCuit()==$valuesArray->getCuit() || $company->getEmail()==$valuesArray->getEmail())
                {
                    $companyExist = true;
                }
                else
                {
                    $companyExist = false;
                }


            }
            

            if($companyExist==true)
            {
                echo '<script type="text/javascript">';
                echo ' alert("The company already exists, please try again.")';  //not showing an alert box.
                echo '</script>';
                $this->ShowSignUpView();
            }
            else if($companyExist==false)
            {
                echo '<script type="text/javascript">';
                echo ' alert("The company was successfully added.")';  //not showing an alert box.
                echo '</script>';
                $this->companyDAO->Add($company);

                $this->ShowSignUpView();
            }

          

            
        }
    }
?>