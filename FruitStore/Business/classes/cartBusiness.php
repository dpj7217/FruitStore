<?php
require_once '../Data/cartData.php';

class cartBusiness
{
    public function addToCart($cartItem) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $cartData = new cartData();
        return $cartData->addToCart($cartItem, $conn);
    }
    
    public function updateQty($userID, $productID, $newQty) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $cartData = new cartData();
        return $cartData->updateQty($userID, $productID, $newQty, $conn);
    }
 
    public function findAll($userID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $cartData = new cartData();
        return $cartData->findAll($userID, $conn);
    }
    
    public function deleteFromCart($userID, $productID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $cartData = new cartData();
        return $cartData->deleteFromCart($userID, $productID, $conn);
    }
}

