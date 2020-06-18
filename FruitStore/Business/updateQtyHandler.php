<?php
session_start();
require_once '../Business/classes/cartBusiness.php';


$userID = $_POST['userID'];
$productID = $_POST['productID'];
$newQty = $_POST['newQty'];
$business = new cartBusiness();

$business->updateQty($userID, $productID, $newQty);

header("location: /FruitStore/presentation/cart.php");
?>