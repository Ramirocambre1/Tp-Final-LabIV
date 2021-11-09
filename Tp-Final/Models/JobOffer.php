<?php

namespace Models;


class JobOffer{

    private $jobOfferId;
    private $jobPositionId;
    private $studentId;

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

    /**
     * Get the value of jobPositionId
     */ 
    public function getJobPositionId()
    {
        return $this->jobPositionId;
    }

    /**
     * Set the value of jobPositionId
     *
     * @return  self
     */ 
    public function setJobPositionId($jobPositionId)
    {
        $this->jobPositionId = $jobPositionId;

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
}




?>