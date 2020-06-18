<?php

class productData
{
    
    public function findAll() {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.product";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function findByName($name) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.product WHERE name = '" . $name . "';";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function findByID($id) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.product WHERE product_ID = '" . $id . "';";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function addProduct($product) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "INSERT INTO fruitstore.product (name, price, description, quantityOnHand, imageFileLocation) VALUES ('" . $product->getName() . "', '" . $product->getPrice() . "', '" .
            $product->getDescription() . "', " . $product->getQuantityOnHand() . ", '" . $product->getImageFileLocation() . "');";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function deleteProduct($id) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "DELETE FROM fruitstore.product WHERE product_ID = " . $id . ";"; 
        
        $result = $conn->query($query);
        return $result;
        
    }
    
    public function editProduct($oldID, $newProduct) {
       $deleted = $this->deleteProduct($oldID);
        
        if ($deleted) {
            $inserted = $this->addProduct($newProduct);
            
            if ($inserted) {
                $_SESSION['editSuccess'] = "User edited successfully";
                return true;
            } else {
                $_SESSION['editFailure'] = "Faied to update User information";
                return false;
            }
        } else {
            $_SESSION['editFailure'] = "User with id of " . $oldID . " could not be found";
            return false;
        }
    }
}

