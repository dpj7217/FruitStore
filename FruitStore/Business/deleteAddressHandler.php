<?php
session_start();
require_once 'classes/addressBusiness.php';

$business = new addressBusiness();
$addressID = $_POST['addressID'];

$result = $business->deleteAddress($_SESSION['username'], $addressID);

if (!$result)
    $_SESSION['addressFailure'] = "Failed to delete address #$addressID";

header("location: /FruitStore/presentation/addresses.php");


