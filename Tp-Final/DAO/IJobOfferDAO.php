<?php
    namespace DAO;

    use Models\JobOffer as JobOffer;
    use DAO\Connection as Connection;

    interface IJobOfferDAO
    {
        function Add(JobOffer $jobOffer);
        function GetAll();
    }
?>