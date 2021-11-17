<?php

namespace Models;

class JobOffer{


    private $JobOfferId;
    private $JobPositionId;
    private $companyId;
    private $description;
    


    /**
     * Get the value of JobOfferId
     */ 
    public function getJobOfferId()
    {
        return $this->JobOfferId;
    }

    /**
     * Set the value of JobOfferId
     *
     * @return  self
     */ 
    public function setJobOfferId($JobOfferId)
    {
        $this->JobOfferId = $JobOfferId;

        return $this;
    }

   
    /**
     * Get the value of JobPositionId
     */ 
    public function getJobPositionId()
    {
        return $this->JobPositionId;
    }

    /**
     * Set the value of JobPositionId
     *
     * @return  self
     */ 
    public function setJobPositionId($JobPositionId)
    {
        $this->JobPositionId = $JobPositionId;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of companyId
     */ 
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set the value of companyId
     *
     * @return  self
     */ 
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }
}






?>