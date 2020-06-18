<?php

class productBusiness
{
    
    
    public function ProductSearch($q) {
        require_once '../Data/productData.php';
        
        $productData = new productData();
        $data = $productData->findByName($q);
        
        return $data;
    }
    
    public function findByID($id) {
        require_once '../Data/productData.php';
        
        $productData = new productData();
        $data = $productData->findByID($id);
        
        return $data;
    }
    
    public function findAll() {
        require_once 'Data/productData.php';
        $productData = new productData();
        
        $data = $productData->findAll();
        return $data;
    }
    
    public function findAllForAllProducts() {
        require_once '../Data/productData.php';
        $productData = new productData();
        
        $data = $productData->findAll();
        return $data;
    }

    public function addProduct($product) {
        require_once '../Data/productData.php';
        $productData = new productData();
        
        $data = $productData->addProduct($product);
        return $data;
    }
    
    public function deleteProduct($id) {
        require_once '../Data/productData.php';
        $productData = new productData();
        
        $data = $productData->deleteProduct($id);
        return $data;
    }
    
    public function editProduct($oldID, $newProduct) {
        require_once '../Data/productData.php';
        $productData = new productData();
        
        $data = $productData->editProduct($oldID, $newProduct);
        return $data;
    }
    
}
    