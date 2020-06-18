<?php

class orderDetailsItem
{
    private $orderID; //used as orderHistoryID for addToOrderHistoryDetails();
    private $productID;
    private $productQty;
    
    public function getOrderID() {
        return $this->orderID;
    }
    
    public function getProductID()
    {
        return $this->productID;
    }
    
    public function getProductQty()
    {
        return $this->productQty;
    }
    
    public function setOrderID($orderID) {
        $this->orderID = $orderID;
    }
    
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }
    
    public function setProductQty($productQty)
    {
        $this->productQty = $productQty;
    }
    
    public function __construct($orderID, $productID, $productQty) {
        $this->orderID = $orderID;
        $this->productID = $productID;
        $this->productQty = $productQty;
    }
    
}

