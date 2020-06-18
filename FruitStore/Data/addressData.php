<?php

class addressData
{
    public function addAddress($address, $conn) {
        $query = "INSERT INTO fruitstore.address (userID, deliverToFirstname, deliverToLastname, street, city, state, zip, country, isPrimaryAddress) VALUES (" . 
            $address->getUserID() . ", '" . 
            $address->getDeliverToFirstname() . "', '" .
            $address->getDeliverToLastname() . "', '" . 
            $address->getStreet() . "', '" . 
            $address->getCity() . "', '" . 
            $address->getState() . "', " . 
            $address->getZip() . ", '" . 
            $address->getCountry() . "', " .
            $address->getIsPrimaryAddress() . ");";
        
        $result = $conn->query($query);
        
        if (!$result) {
            echo "<h1>Insert Address Error: " . $conn->errno . " " . $conn->error . "</h1></br>" . $query ;
            die();
        }
        
        if ($result) {
            return $conn->insert_id;
        } else {
            return $result;
        }
    }
    
    public function getAllAddresses($userID, $conn) {
        $query = "SELECT * FROM fruitstore.address WHERE userID = $userID";
        $result = $conn->query($query);
        return $result;
    }
    
    public function deleteAddress($userID, $addressID, $conn) {
        $query = "DELETE FROM fruitstore.address WHERE userID = $userID AND addressID = $addressID";
        $result = $conn->query($query);
        return $result;
    }
    
    public function getPrimary($userID, $conn) {
        $query = "SELECT * FROM fruitstore.address WHERE userID = $userID AND isPrimaryAddress = 1";
        $result = $conn->query($query);
        return $result;
    }
    
    public function updatePrimary($userID, $newPrimaryAddressID, $conn) {
        $worked = true;
        $conn->autocommit(false);
        
        /*set current primary card to non-primary*/
        $query = "UPDATE fruitstore.address SET isPrimaryAddress = 0 WHERE userID = $userID AND isPrimaryAddress = 1";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h3> Error setting primary address to non-primary<br/> " . $conn->errno . ": " . $conn->error . "<h3></br>" . $query;
            die();
        }
        
        if (!$result) {
            $conn->rollback();
            $worked = false;
            return $worked;
        }
        
        $conn->commit();
        
        /*set new card to primary card*/
        $query = "UPDATE fruitstore.address SET isPrimaryAddress = 1 WHERE userID = $userID AND addressID = $newPrimaryAddressID";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h3> Error setting new card as primary<br/> " . $conn->errno . ": " . $conn->error . "<h3></br>" . $query;
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
    
    public function setPrimary($userID, $newPrimaryAddressID, $conn) {
        $query = "UPDATE fruitstore.address SET isPrimaryAddress = 1 WHERE userID = $userID AND addressID = $newPrimaryAddressID";
        $result = $conn->query($query);
        
        return $result;
    }
}

