<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."company-list-admin.php");
        }

        public function ShowEditView()
        {
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowListViewUser()
        {   $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."company-list-user.php");

        }

       
        public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->companyDAO->Remove($id);

            $this->ShowListView();
        }

        public function Edit($companyId,$companyName,$phoneNumber,$cuit,$email)
        {   
            $company = new company();
            $company->setCompanyId($companyId);
            $company->setCompanyName($companyName);
            $company->setPhoneNumber($phoneNumber);
            $company->setCuit($cuit);
            $company->setEmail($email);

            

            $this->companyDAO->Edit($company);

            $this->ShowListView();
        }

        public function Add( $companyName,$phoneNumber,$cuit,$email)
        {
            $company = new company();
            $company->setCompanyName($companyName);
            $company->setPhoneNumber($phoneNumber);
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

        public function GetCompanyByName($companyName)
        {
            $companyList=$this->companyDAO->GetCompanyByName($companyName);
            
                if($companyList!=NULL)
                {
                   
                    require_once(VIEWS_PATH."validate-session.php");
                    require_once(VIEWS_PATH."company-list-user.php");
                }
                else
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("There is no company with that name, please try again.")';  
                    echo '</script>';
                    $companyList = $this->companyDAO->GetAll();
                    require_once(VIEWS_PATH."validate-session.php");
                    require_once(VIEWS_PATH."company-list-user.php");
                }
                
            
        }

    }
?>