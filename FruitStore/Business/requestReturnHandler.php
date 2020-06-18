<?php
require_once 'classes/orderBusiness.php';
session_start();


$business = new orderBusiness();
$orderID = $_POST['orderID'];

$data = $business->setDeliverToReturn($orderID);

if ($data) {
    $_SESSION['successMessage'] = "Return requested successfully";
    header("location: /FruitStore/presentation/userDetails.php");
} else {
    $_SESSION['failureMessage'] = "Failed to process return Request";
    header("location: /FruitStore/presentation/userDetails.php");
}



?>