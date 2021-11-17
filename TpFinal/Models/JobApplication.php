<?php

    namespace Models;

    class JobApplication{


        private $jobApplicationId;
        private $studentId;
        private $jobOfferId;



        

        /**
         * Get the value of jobApplicationId
         */ 
        public function getJobApplicationId()
        {
                return $this->jobApplicationId;
        }

        /**
         * Set the value of jobApplicationId
         *
         * @return  self
         */ 
        public function setJobApplicationId($jobApplicationId)
        {
                $this->jobApplicationId = $jobApplicationId;

                return $this;
        }

        /**
         * Get the value of studentId
         */ 
        public function getStudentId()
        {
                return $this->studentId;
        }

        /**
         * Set the value of studentId
         *
         * @return  self
         */ 
        public function setStudentId($studentId)
        {
                $this->studentId = $studentId;

                return $this;
        }

        /**
         * Get the value of jobOfferId
         */ 
        public function getJobOfferId()
        {
                return $this->jobOfferId;
        }

        /**
         * Set the value of jobOfferId
         *
         * @return  self
         */ 
        public function setJobOfferId($jobOfferId)
        {
                $this->jobOfferId = $jobOfferId;

                return $this;
        }
    }


?>