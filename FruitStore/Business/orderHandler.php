<?php
require_once 'classes/cartBusiness.php';
require_once 'classes/orderBusiness.php';
require_once 'classes/creditCardBusiness.php';
require_once 'classes/addressBusiness.php';
require_once '../Data/models/order.php';
require_once '../Data/models/orderDetailsItem.php';
/*
 * use this to check cc and address and place order/send orderconf
 * 
 */

//instantiate classes needed for insertion
$cart = new cartBusiness();
$orderBusiness = new orderBusiness();
$creditCardBusiness = new creditCardBusiness();
$addressBusiness = new addressBusiness();


//get user input and set variables for insertion 
$userID = $_SESSION['username'];
$dateOrdered = date('Y-m-d H:i:s');
$delivered = 0;
$creditCard = $creditCardBusiness->getPrimary($userID);
$creditCard = $creditCard->fetch_assoc(); //get primary card as associated array
$address = $addressBusiness->getPrimary($userID);
$address = $address->fetch_assoc();//get primary address as associated array

/*
 * 
 * MOVE FROM CART TO ORDER
 * 
 */

//instantiate item to insert
$orderItem = new orderItem($userID, $address['addressID'], $creditCard['creditCardID'], $dateOrdered, $delivered);
$orderID = $orderBusiness->addToOrders($orderItem);
$orderHistoryID = $orderBusiness->addToOrderHistory($orderID, $orderItem);

//if item not added to orders
if (!$orderID || !$orderHistoryID) {
    $_SESSION['orderFailed'] = "Failed to order items. Please try again";
    header('location: /FruitStore/presentation/cart.php');
    die();
}

//get all items from cart
$cartItems = $cart->findAll($_SESSION['username']);

//get array for each item in cart
while ($item = $cartItems->fetch_assoc()) {
    $productID = $item['productID'];    
    $productQty = $item['productQty'];
    
    //instantiate item for insertion to fruitstore.orderDetails
    $orderDetailsItem = new orderDetailsItem($orderID, $productID, $productQty);

    $addedToOrderDetails = $orderBusiness->addToOrderDetails($orderDetailsItem);
    
    //if item not added to details
    if (!$addedToOrderDetails) {
        $_SESSION['orderFailed'] = "Failed to order items. Please try again";
        header('location: /FruitStore/presentation/cart.php');
        die();
    }
    
    //instantiate item for insertion to fruitstore.orderHistoryDetails
    $orderHistoryDetailsItem = new orderDetailsItem($orderHistoryID, $productID, $productQty);
    $addedToOrderHistoryDetails = $orderBusiness->addToOrderDetailsHistory($orderHistoryDetailsItem);
   
    //if item not added to orderhistorydetails
    if (!$addedToOrderHistoryDetails) {
        $_SESSION['orderFailed'] = "Failed to order items. Please try again";
        header('location: /FruitStore/presentation/cart.php');
        die();
    }
    
    //delete item from cart
    $cart->deleteFromCart($_SESSION['username'], $productID);
}


$_SESSION['cartSuccess'] = "Ordered Products Successfully";
header("location: /FruitStore/index.php");
die();





?>