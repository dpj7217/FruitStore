<?php
session_start();
require_once 'classes/creditCardBusiness.php';

$creditCardNumber = $_POST['creditCardNumber'];
$business = new creditCardBusiness();

$result = $business->deleteCard($creditCardNumber);

if (!$result) 
    $_SESSION['creditFailure'] = "Failed to delete card.";

header("location: /FruitStore/presentation/userDetails.php");


?>