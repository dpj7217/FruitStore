<?php
require_once 'protectPage.php';
require_once 'header.php';
require_once '../Business/classes/orderBusiness.php';
require_once '../Business/classes/productBusiness.php';
require_once '../Business/classes/creditCardBusiness.php';
require_once '../Business/classes/userBusiness.php';

$business = new orderBusiness();
$productBusiness = new productBusiness();
$creditCardBusiness = new creditCardBusiness();
$userBusiness = new userBusiness();

$data = $business->getDeliveredOrders($_SESSION['username']);

if ($data->num_rows > 0) {
    include '_showSalesReport.php';
}
else {
    $_SESSION['failureMessage'] = "You must have recieved orders in order to request a return.";
    header("location: /FruitStore/presentation/userDetails.php");
}
?>
