<?php
    namespace DAO;

  
    use DAO\Connection as Connection;
    use Models\UserCompany as UserCompany;

interface IUserCompanyDAO
    {
        function Add(UserCompany $user);
        function GetAll();
        function GetByEmail($email);
        function AddSignUp(UserCompany $user);
    }   
?>

