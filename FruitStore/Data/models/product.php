<?php
namespace Data\models;

class product
{
    private $name;
    private $price;
    private $description;
    private $quantityOnHand;
    private $imageFileLocation;
    
    public function getImageFileLocation() {
        return $this->imageFileLocation;
    }
    
    public function setImageFileLocation($imageFileLocation) {
        $this->imageFileLocation = $imageFileLocation;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuantityOnHand()
    {
        return $this->quantityOnHand;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setQuantityOnHand($quantityOnHand)
    {
        $this->quantityOnHand = $quantityOnHand;
    }
    
    public function __construct($name, $price, $description, $quantityOnHand, $imageFileLocation){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantityOnHand = $quantityOnHand;
        $this->imageFileLocation = $imageFileLocation;
    }

}

