<?php
require_once '../business/classes/cartBusiness.php';



$userID = $_POST['userID'];
$productID = $_POST['productID'];
$business = new cartBusiness();

$business->deleteFromCart($userID, $productID);
header("location: /FruitStore/presentation/cart.php");
?>