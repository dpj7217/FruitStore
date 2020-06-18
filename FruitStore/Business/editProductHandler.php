<?php
use Data\models\product;

session_start();
require_once '../Business/classes/productBusiness.php';
require_once '../Data/models/product.php';

$oldID = $_POST['productID'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$imageFileLocation = $_POST['imageFileLocation'];

$business = new productBusiness();
$product = new product($name, $price, $description, $quantity, $imageFileLocation);

$business->editProduct($oldID, $product);
header("location: /FruitStore/presentation/products.php");
?>