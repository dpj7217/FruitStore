<?php
require_once 'protectPage.php';
require_once 'header.php';
require_once '../business/classes/addressBusiness.php';

$business = new addressBusiness();
$data = $business->getAllAddresses($_SESSION['username']);

if ($data->num_rows > 0) {
    include "_showAddresses.php";
} else {
    $_SESSION['addressSuccess'] = "You don't have any addresses here yet. Please add one to see them.";
    header("location: addAddress.php");
    die();
}


?>