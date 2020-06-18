<?php

class creditCardData
{
    public function getAllCards($userID, $conn) {
        $query = "SELECT * FROM fruitstore.creditcard WHERE userID = $userID";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'> Retrieve Cards Error: " . $conn->error;
            die();
        }
        
        return $result;
    }
    
    public function updatePrimary($userID, $creditCardNumber, $conn) {
        $conn->autocommit(false);
        $worked = true;
        
        /*set current primary card to non-primary*/
        $query = "UPDATE fruitstore.creditcard SET isPrimaryCard = 0 WHERE userID = $userID AND isPrimaryCard = 1";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'>Unset primary Error: " . $conn->error;
            die();
        }
        
        if (!$result) {
            $worked = false;
            $conn->rollback();
            return $worked;
        } else {
            $conn->commit();
        }
        
        
        
        /*set new card to primary*/
        $query = "UPDATE fruitstore.creditcard SET isPrimaryCard = 1 WHERE userID = $userID AND creditCardNumber = '$creditCardNumber'";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'>Set primary error: " . $conn->error;
            die();
        }
        
        if (!$result) {
            $worked = false;
            $conn->rollback();
            return $worked;
        }
        
        $conn->commit();
        return $worked;
    }
    
    public function findByID($creditCardID, $conn) {
        $query = "SELECT * FROM fruitstore.creditcard WHERE creditCardID = $creditCardID";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1> class='bg-danger text-white'>Could not find product. Error: : " . $conn->error;
            die();
        }
        
        return $result;
    }
    
    public function deleteCard($creditCardNumber, $conn) {
        $query = "DELETE FROM fruitstore.creditcard WHERE creditCardNumber = '$creditCardNumber'";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1> class='bg-danger text-white'>Delete Error: " . $conn->errno . ": " . $conn->error;
            echo $query;
            die();
        }
        
        return $result;
    }
    
    public function addToCreditCards($creditCard, $conn) {
        
        $query = "INSERT INTO `creditcard`(`userID`, `creditCardNumber`, `firstname`, `middleInitial`, `lastname`, `expMonth`, `expYear`, `cvv`, `isPrimaryCard`) VALUES (" . 
        $creditCard->getUserID() . ", '" . 
        $creditCard->getCreditCardNumber() . "', '" . 
        $creditCard->getFirstname() . "', '" . 
        $creditCard->getMiddleInitial() . "', '" . 
        $creditCard->getLastname() ."', " . 
        $creditCard->getExpMonth() . ", " . 
        $creditCard->getExpYear() . "," . 
        $creditCard->getCvv() . ", " . 
        $creditCard->getIsPrimaryCard() . ");"; 
        
        $result = $conn->query($query);
        
        if ($conn->errno == 1062) {
            session_start();
            $_SESSION['creditFailure'] = "You've already added a card with that number. Please specify a different credit card number.";
            header("location: /FruitStore/presentation/addCreditCard.php");
            die();
        }
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white'>Insert Error: " . $conn->errno . ": " . $conn->error . "</h1>";
            echo "<h1> QUERY: " . $query . "</h1>";
            die();
        }
        
        $conn->close();
        return $result;
    }
    
    public function getPrimary($userID, $conn) {
        $query = "SELECT * FROM fruitstore.creditcard WHERE userID = $userID AND isPrimaryCard = 1"; 
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1> class='bg-danger text-white'>No primary card on file: " . $conn->error;
            die();
        }
        
        return $result;
    }
}

