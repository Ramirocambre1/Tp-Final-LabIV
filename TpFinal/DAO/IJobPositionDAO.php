<?php
    namespace DAO;

    use Models\JobPosition as JobPosition;
    use DAO\Connection as Connection;

    interface IJobPositionDAO
    {
        function Add(JobPosition $jobPosition);
        function GetAll();
    }
?>