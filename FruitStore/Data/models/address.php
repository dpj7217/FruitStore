<?php

class address
{
    private $userID;
    private $deliverToFirstname;
    private $deliverToLastname;
    private $street;
    private $city;
    private $state;
    private $zip;
    private $country;
    private $isPrimaryAddress;
    
    
    public function getIsPrimaryAddress()
    {
        return $this->isPrimaryAddress;
    }

    public function setIsPrimaryAddress($isPrimaryAddress)
    {
        $this->isPrimaryAddress = $isPrimaryAddress;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getDeliverToFirstname()
    {
        return $this->deliverToFirstname;
    }

    public function getDeliverToLastname()
    {
        return $this->deliverToLastname;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setDeliverToFirstname($deliverToFirstname)
    {
        $this->deliverToFirstname = $deliverToFirstname;
    }

    public function setDeliverToLastname($deliverToLastname)
    {
        $this->deliverToLastname = $deliverToLastname;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    
    public function __construct($userID, $deliverToFirstname, $deliverToLastname, $street, $city, $state, $zip, $country, $isPrimaryAddress) {
        $this->userID = $userID;
        $this->deliverToFirstname = $deliverToFirstname;
        $this->deliverToLastname = $deliverToLastname;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->country = $country;
        $this->isPrimaryAddress = $isPrimaryAddress;
    }
}

