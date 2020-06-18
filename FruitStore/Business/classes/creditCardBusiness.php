<?php
require_once '../Data/creditCardData.php';

class creditCardBusiness
{
    public function  getAllCards($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->getAllCards($userID, $conn);
    }
    
    public function updatePrimary($userID, $creditCardNumber)  {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->updatePrimary($userID, $creditCardNumber, $conn);
    }
    
    public function findByID($creditCardID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->findByID($creditCardID, $conn);
    }
    
    public function addToCreditCards($creditCard) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->addToCreditCards($creditCard, $conn);
    }
    
    public function getPrimary($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->getPrimary($userID, $conn);
    }
    
    public function deleteCard($creditCardNumber) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $creditCardData = new creditCardData();
        return $creditCardData->deleteCard($creditCardNumber, $conn);
    }
}


