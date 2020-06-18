<?php
require_once '../Data/addressData.php';

class addressBusiness
{
    public function addAddress($address) {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->addAddress($address, $conn);
    }
    
    public function getAllAddresses($userID) {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->getAllAddresses($userID, $conn);
    }
    
    public function deleteAddress($userID, $addressID) {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->deleteAddress($userID, $addressID, $conn);
    }
    
    public function getPrimary($userID) {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->getPrimary($userID, $conn);
    }
    
    public function updatePrimary($userID, $newPrimaryAddressID) {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->updatePrimary($userID, $newPrimaryAddressID, $conn);
    }
    
    public function setPrimary($userID, $newPrimaryAddressID)  {
        $addressData = new addressData();
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        return $addressData->setPrimary($userID, $newPrimaryAddressID, $conn);
    }
}

