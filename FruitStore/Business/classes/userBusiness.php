<?php
require_once '../Data/userData.php';

class userBusiness
{
    
    public function addUser($user) {
        $data = new userData();
        $result = $data->addUser($user);
        return $result;
    }
    
    public function editUser($oldID, $newUser) {
        $data = new userData();
        $result = $data->editUser($oldID, $newUser);
        return $result;
    }
    
    public function deleteUser($id) {
        $data = new userData();
        $result = $data->deleteUser($id);
        return $result;
    }
    
    public function findAll() {
        $data = new userData();
        $result = $data->findAll();
        return $result;
    }
    
    public function findByID($id) {
        $data = new userData();
        $result = $data->findByID($id);
        return $result;
    }
}

