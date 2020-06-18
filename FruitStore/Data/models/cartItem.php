<?php

class cartItem
{
    private $productID;
    private $productQty;
    private $dateAdded;
    private $userID;

    
    public function getProductID()
    {
        return $this->productID;
    }

    public function getProductQty()
    {
        return $this->productQty;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function setProductQty($productQty)
    {
        $this->productQty = $productQty;
    }

    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function __construct($productID, $productQty, $dateAdded, $userID) {
        $this->productID = $productID;
        $this->productQty = $productQty;
        $this->dateAdded = $dateAdded;
        $this->userID = $userID;
    }
}










