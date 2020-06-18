<?php
require_once '../Data/orderData.php';

class orderBusiness
{
    
    public function addToOrders($orderItem) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->addToOrders($orderItem, $conn);
        return $result;
    }
    
    public function addToOrderDetails($orderDetailsItem) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        $orderData = new orderData();
        $result = $orderData->addToOrderDetails($orderDetailsItem, $conn);
        
        return $result;
    }
    
    public function getAllOrders($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        $orderData = new orderData();
        $result = $orderData->getAllOrders($userID, $conn);
        
        return $result;
    }
    
    public function deleteFromOrders($userID, $orderID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->deleteFromOrders($userID, $orderID, $conn);
        return $result;
    }
    
    public function addToOrderHistory($orderID, $orderItem){
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->addToOrderHistory($orderID, $orderItem, $conn);
        return $result;
    }
    
    public function addToOrderDetailsHistory($orderDetailsItem) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->addToOrderDetailsHistory($orderDetailsItem, $conn);
        return $result;
    }

    public function deliverPreviousOrder($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->deliverPreviousOrder($userID, $conn);
        return $result;
    }
    
    public function getPreviousOrder($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->getPreviousOrder($userID, $conn);
        return $result;
    }
    
    public function getOrderByID($orderID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->getOrderByID($orderID, $conn);
        return $result;
    }
    
    public function getOrdersInside($dateBegin, $dateEnd, $userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->getOrdersInside($dateBegin, $dateEnd, $userID, $conn);
        return $result;
    }
    
    public function updateOrderDelivery($orderID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->updateOrderDelivery($orderID, $conn);
        return $result;
        
    }
    
    public function getCurrentOrders($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->getCurrentOrders($userID, $conn);
        return $result;
        
    }
    
    public function getDeliveredOrders($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->getDeliveredOrders($userID, $conn);
        return $result;
    }
    
    public function setDeliverToReturn($orderID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $orderData = new orderData();
        
        $result = $orderData->setDeliverToReturn($orderID, $conn);
        return $result;
    }
}

