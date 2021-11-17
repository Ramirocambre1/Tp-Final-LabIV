<?php
    namespace DAO;

    use Models\UserAdmin as UserAdmin;
    use DAO\Connection as Connection;

    interface IUserAdminDAO
    {
        function Add(UserAdmin $userAdmin);
        function GetAll();
        function GetByEmail($email);
    }
?>

