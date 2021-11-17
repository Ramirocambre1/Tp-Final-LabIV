<?php
    namespace DAO;

    use Models\JobApplication as JobApplication;
    use DAO\Connection as Connection;

    interface IJobApplicationDAO
    {
        function Add(JobApplication $jobApplication);
        function GetAll();
    }
?>

