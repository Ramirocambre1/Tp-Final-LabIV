<?php
    namespace DAO;

    use Models\JobPosition as JobPosition;
    use DAO\Connection as Connection;

    interface IJobPositionDAO
    {
        function Add(JobPosition $jobposition);
        function GetAll();
        function GetByCareer();
        function GetJobById($jobPositionId);
        function Remove($jobPositionId);
        function Edit(JobPosition $jobposition);
        function GetJobById2($jobPositionId);
    }
?>