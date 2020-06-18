<?php
require_once 'classes/orderBusiness.php';

$orderID = $_POST['orderID'];

$business = new orderBusiness();

$data = $business->updateOrderDelivery($orderID);

if (!$data) 
    $_SESSION['deliverFailure'] = "Failed to update delivery status of order #" . $orderID;

header("location: " . $_POST['from']);

?>