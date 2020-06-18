<?php

class orderItem
{
    private $userID;
    private $addressID;
    private $creditCardID;
    private $dateOrdered;
    private $delivered; //bool to hold delivery status

    public function getAddressID()
    {
        return $this->addressID;
    }

    public function getCreditCardID()
    {
        return $this->creditCardID;
    }

    public function setAddressID($addressID)
    {
        $this->addressID = $addressID;
    }

    public function setCreditCardID($creditCardID)
    {
        $this->creditCardID = $creditCardID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getDateOrdered()
    {
        return $this->dateOrdered;
    }

    public function getDelivered()
    {
        return $this->delivered;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setDateOrdered($dateOrdered)
    {
        $this->dateOrdered = $dateOrdered;
    }

    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
    }
    
    public function __construct($userID, $addressID, $creditCardID ,$dateOrdered, $delivered) {
        $this->userID = $userID;
        $this->addressID = $addressID;
        $this->creditCardID = $creditCardID;
        $this->dateOrdered = $dateOrdered;
        $this->delivered = $delivered;
    }
}

