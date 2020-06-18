<?php
session_start();
require_once '../Data/models/cartItem.php';
require_once '../Business/classes/cartBusiness.php';
unset($_SESSION['cartSuccess']);
unset($_SESSION['cartFailure']);

/* TO DO:
 *      get data from form
 *      create cartItem object 
 *      pass cartItem object to business/cartBusiness->addToCart function
 *      if (addToCart)
 *          return to index with message success of "added item # to cart"
 *      else 
 *          return to index with message failure of "failed to add item please try again"
 */

$userID = $_SESSION['username'];
$productID = $_POST['id'];
$dateAdded = date('Y-m-d H:i:s');

$cartItem = new cartItem($productID, 1/*equal to one initially but can be changed on cart screen*/, $dateAdded, $userID);


$business = new cartBusiness();

$result = $business->addToCart($cartItem);

if ($result) 
    $_SESSION['cartSuccess'] = "Product #". $productID . " added to cart successfully";
else 
    $_SESSION['cartFailure'] = "Could not add product to cart. Please try again";

header("location: /FruitStore/index.php");
?>