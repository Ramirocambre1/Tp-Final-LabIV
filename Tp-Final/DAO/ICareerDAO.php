<?php
    namespace DAO;

    use Models\Career as Career;
    use DAO\Connection as Connection;

    interface ICareerDAO
    {
        function Add(Career $career);
        function GetAll();
    }
?>