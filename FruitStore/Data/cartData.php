<?php
require_once '../presentation/header.php';

class cartData
{
    public function addToCart($cartItem) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.cart WHERE productID = " . $cartItem->getProductID() . " AND userID = " . $cartItem->getUserID() . " ;";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> SELECT ERROR: " . $conn->error . "</h1>";
            die();
        }
        
        if ($result->num_rows >= 1) {
            $row = $result->fetch_assoc();
            $this->increaseQty($row['userID'], $row['productID']);
            return true;
        } else {
            $query = "INSERT INTO fruitstore.cart (productID, productQty, dateAdded, userID) VALUES (" .
                $cartItem->getProductID() . ", " .
                $cartItem->getProductQty() . ", '" .
                $cartItem->getDateAdded() . "', " .
                $cartItem->getUserID() . ");";
                
            $result = $conn->query($query);
            
            if ($conn->error) {
                echo "<h1 class='bg-danger text-white'> INSERT ERROR: " . $conn->error . "</h1>";
                die();
            } else
                return $result;
        }
    }
    
    public function increaseQty($userID, $productID) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "UPDATE fruitstore.cart SET productQty = productQty + 1 WHERE userID = $userID AND productID = $productID";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> INCREASE ERROR: " . $conn->error . "</h1>";
            die();
        } else {
            return $result;
        }
    }
    
    public function updateQty($userID, $productID, $newQty, $conn) {
        $query = "UPDATE fruitstore.cart SET productQty = $newQty WHERE userID = $userID AND productID = $productID";
        
        $reuslt = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> Error: " . $conn->error . "</h1>";
            die();
        }
        
        return $result;
    }
    
    public function findAll($userID, $conn) {
        $query = "SELECT * FROM fruitstore.cart WHERE userID = " . $userID . ";";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> Error: " . $conn->error . "</h1>";
            die();
        }
        
        return $result;
    }
    
    public function deleteFromCart($userID, $productID, $conn) {
        $query = "DELETE FROM fruitstore.cart WHERE userID = $userID AND productID = $productID;";

        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> Error: " . $conn->error . "</h1>";
            die();
        }
        
        return $result;
    }
    
}











