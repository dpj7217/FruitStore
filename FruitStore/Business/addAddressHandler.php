<?php
session_start();
require_once '../Data/models/address.php';
require_once 'classes/addressBusiness.php';

$deliverToFirstname = $_POST['firstname'];
$deliverToLastname = $_POST['lastname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$primaryAddress = 0;

if ($_POST['primaryCheck'])
    $primaryAddress = 1;

$business = new addressBusiness();
$address = new address($_SESSION['username'], $deliverToFirstname, $deliverToLastname, $street, $city, $state, $zip, $country, 0);

$result = $business->addAddress($address);

//if user wants this address to be primary
if ($primaryAddress) {
    //select primary card
    $primary = $business->getPrimary($_SESSION['username']);
    //if a primary address already exists
    if ($primary) {
        //update primary address
        $newPrimary = $business->updatePrimary($_SESSION['username'], $result);
        //if primary card update failed
        if (!$newPrimary) {
            $_SESSION['addressFailure'] = "Failed to update this card to priamry card.";
            header("location: /FruitStore/presentation/addAddress.php");
            die();
        }
    } else {
        //set primary card
        $newPrimary = $business->setPrimary($_SESSION['username'], $result->insert_id);
        
        //test primary card update
        if (!$newPrimary) {
            $_SESSION['addressFailure'] = "Failed to update this card to priamry card.";
            header("location: /FruitStore/presentation/addAddress.php");
            die();
        }
    }
}
    
if ($result) 
    $_SESSION['addressSuccess'] = "Address added successfully";
else 
    $_SESSION['addressFailure'] = "Failed to add address";

header("location: /FruitStore/presentation/userDetails.php")
?>