<?php

class creditCard
{
    private $userID;
    private $creditCardNumber;
    private $firstname;
    private $middleInitial;
    private $lastname;
    private $expMonth;
    private $expYear;
    private $cvv;
    private $isPrimaryCard;
    
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    public function getExpMonth()
    {
        return $this->expMonth;
    }

    public function getExpYear()
    {
        return $this->expYear;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function getIsPrimaryCard()
    {
        return $this->isPrimaryCard;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = $creditCardNumber;
    }

    public function setExpMonth($expMonth)
    {
        $this->expMonth = $expMonth;
    }

    public function setExpYear($expYear)
    {
        $this->expYear = $expYear;
    }

    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    public function setIsPrimaryCard($isPrimaryCard)
    {
        $this->isPrimaryCard = $isPrimaryCard;
    }

    public function __construct($userID, $creditCardNumber, $firstname, $middleInitial, $lastname ,$expMonth, $expYear, $cvv, $isPrimaryCard) {
        $this->userID = $userID;
        $this->creditCardNumber = $creditCardNumber;
        $this->firstname = $firstname;
        $this->middleInitial = $middleInitial;
        $this->lastname = $lastname;
        $this->expMonth = $expMonth;
        $this->expYear = $expYear;
        $this->cvv = $cvv;
        $this->isPrimaryCard = $isPrimaryCard;
    }
    
}

