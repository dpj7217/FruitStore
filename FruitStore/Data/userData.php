<?php
require_once 'models/user.php';

class userData
{
//     private $conn;
    
//     public function __construct() {
//         $this->conn = new mysqli("localhost", "root", "root", "fruitstore");
//     }
    
    public function addUser(User $user) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        
        $query = "INSERT INTO fruitstore.user (firstname, middleInitial, Lastname, username, password, email, isAdmin) VALUES ('" . $user->getFirstname() . "', '" .$user->getMiddleInitial() .
        "', '" . $user->getLastname() . "', '" . $user->getUsername() . "', '" . $user->getPassword() . "', '" . $user->getEmail() . "', " . $user->getIsAdmin() . ")";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function deleteUser($id) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "DELETE FROM fruitstore.user WHERE userID = " . $id . ";";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function editUser($id, $newUser) {
        $deleted = $this->deleteUser($id); 
        
        if ($deleted) {
            $inserted = $this->addUser($newUser);
            
            if ($inserted) {
                $_SESSION['editSuccess'] = "User edited successfully";
                return true;
            } else {
                $_SESSION['editFailure'] = "Faied to update User information";
                return false;
            }
        } else {
            $_SESSION['editFailure'] = "User with id of " . $id . " could not be found";
            return false;
        }
    }
    
    public function findAll() {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.user";
        
        $result = $conn->query($query);
        return $result;
    }
    
    public function findByID($id) {
        $conn = new mysqli("localhost", "root", "root", "fruitstore");
        $query = "SELECT * FROM fruitstore.user WHERE userID = " . $id . ";";
        
        $result = $conn->query($query);
        return $result;
    }
    
}

