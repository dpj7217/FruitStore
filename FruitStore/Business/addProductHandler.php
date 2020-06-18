<?php
use Data\models\product;

session_start();
require_once 'classes/productBusiness.php';
require_once '../Data/models/product.php';

if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['quantity']) || empty($_POST['imageLocation'])) {
    $_SESSION['addProductError'] = "All fields required";
    header("location: /FruitStore/presentation/products.php");
    die();
}

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity']; 
$imageLocation = $_POST['imageLocation'];

$product = new product($name, $price, $description, $quantity, $imageLocation);
$business = new productBusiness();

$result = $business->addProduct($product);

if ($result) {
    $_SESSION['addProductSuccess'] = "Product Added Successfully";
} else {
    $_SESSION['addProductError'] = "Failed to add product";
}

header("location: /FruitStore/presentation/addProduct.php");
?>