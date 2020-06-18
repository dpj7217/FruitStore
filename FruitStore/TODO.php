<?php

//TODO for user details
//current orders
//past orders
//credit card
//address

//TODO for admin
//all outstanding orders
//outstanding order details

//TODO for orders
//place odere (move from cart to order table)
//set delivered status (after certain amount of time? allow admin to mark as delivered?) UPDATE fruitstore.orders.delivered
//make sure "data" is atomic

//PLAN FOR ORDER DETAILS:::
//in orderHandler.php  
    //addToOrders with info
    //then for each product in cart, create orderDetailsItem and add to orderDetails

//PLAN FOR ORDER HISTORY:::
//allow users to see list of previously ordered products and reorder them
    //need to store productID and productQty to do this
    
//automaticaly add placed orders to orderHistory?
?>

<!-- 
--
--
-- GET SALES REPORT SECTION
--
--
 -->
