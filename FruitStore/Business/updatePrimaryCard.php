<?php
require_once 'classes/creditCardBusiness.php';

$userID = $_POST['userID'];
$creditCardNumber = $_POST['creditCardNumber'];

$business = new creditCardBusiness();

$result = $business->updatePrimary($userID, $creditCardNumber);

if (!$result) 
    $_SESSION['creditFailure'] = "Failed to set card as primary card";

if ($_POST['fromFinalize']) 
    header("location: /FruitStore/presentation/finalizeOrder.php");
else 
    header("location: /FruitStore/presentation/userDetails.php");

