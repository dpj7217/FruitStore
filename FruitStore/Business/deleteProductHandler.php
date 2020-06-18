<?php
require_once 'productBusiness.php';
session_start();

unset($_SESSION['deleteSuccess']);
unset($_SESSION['deleteFailure']);

$business = new productBusiness();
$id = $_POST['productID'];


$result = $business->deleteProduct($id);

if ($result) {
    $_SESSION['deleteSuccess'] = "Product #" . $id . " deleted successfully";
}
else {
    $_SESSION['deleteFailure'] = "Deletion of product #" . $id . " failed. Please try again.";
}

header("location: /FruitStore/presentation/products.php");
?>