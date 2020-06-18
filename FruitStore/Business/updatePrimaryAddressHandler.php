<?php
session_start();
require_once 'classes/addressBusiness.php';

$business = new addressBusiness();
$addressID = $_POST['addressID'];

$result = $business->updatePrimary($_SESSION['username'], $addressID);

if (!$result)
    $_SESSION['addressError'] = "Failed to update address #" . $addressID . "to primary";


if ($_POST['fromFinalize']) 
    header("location: /FruitStore/presentation/finalizeOrder.php");
else 
    header("location: /FruitStore/presentation/userDetails.php");