<?php
    namespace DAO;

    use Models\Company as Company;
    use DAO\Connection as Connection;

    interface ICompanyDAO
    {
        function Add(Company $company);
        function GetAll();
        function Remove($companyId);
        function Edit(Company $company);
        function GetCompanyByName($companyName);
    }
?>