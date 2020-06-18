<?php

class orderData
{
    public function addToOrders($orderItem, $conn) {
        $query = "INSERT INTO fruitstore.orders (userID, addressID, creditCardID, dateOrdered, delivered) VALUES (" . 
            $orderItem->getUserID() . ", " .
            $orderItem->getAddressID() . ", " .
            $orderItem->getCreditCardID() . ", '" . 
            $orderItem->getDateOrdered() . "', " .
            $orderItem->getDelivered() . ");";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Add to Orders Error: </br> " . $conn->error . "</h1><br/> " . $query;
            die();
        }
        
        if ($result)
            return $conn->insert_id;
        else 
            return false;
    }

    
    
    
    
    public function addToOrderDetails($orderDetailsItem, $conn) {
        $query = "INSERT INTO fruitstore.orderDetails (orderID, productID, productQty) VALUES (" . 
            $orderDetailsItem->getOrderID() . ", " .
            $orderDetailsItem->getProductID() . ", " .
            $orderDetailsItem->getProductQty() . ");";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Add to Order Details Error: </br> " . $conn->error . "</h1>";
            die();
        }
        
        return $result;
    }
    
    
    
    
    
    public function getAllOrders($userID, $conn) {
        $result = array();
        $query = "SELECT orderID FROM fruitstore.orders WHERE userID = $userID";
        $orders = $conn->query($query);

        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> get all Orders Error: </br> " . $conn->error . "</h1>";
            die();
        }
        
        while($row = $orders->fetch_assoc()) {
            $query = "SELECT * FROM fruitstore.orderdetails WHERE orderID = " . $row['orderID'];
            $orderDetails = $conn->query($query);
            
            if ($conn->error) {
                echo "<h1 class='bg-danger text-white '> get all order details Error: </br> " . $conn->error . "</h1>";
                die();
            }
            
            array_push($result, $orderDetails);
        }
        
        return $result;
    }
    
    
    
    
    
    public function deleteFromOrders($userID, $orderID, $conn) {
        $query = "DELETE FROM fruitstore.orders WHERE orderID = $orderID AND userID = $userID";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Delete from orders Error: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        $query = "DELETE FROM fruitstore.orderdetails WHERE orderID = $orderID";
        
        $result = $conn->query($query);
        return $result;
    }
    
    
    
    
    
    public function addToOrderHistory($orderID, $orderItem, $conn) {
        $query = "INSERT INTO fruitstore.orderHistory (orderID, userID, creditCardID, addressID, dateOrdered) VALUES (" . 
            $orderID . ", " . 
            $orderItem->getUserID() . ", " . 
            $orderItem->getCreditCardID() . ", " .
            $orderItem->getAddressID() . ", '" .
            $orderItem->getDateOrdered() . "');";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Add to Order History Error: </br> " . $conn->error . "</h1>" . $query;
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $conn->insert_id;
    }
    
    
    
    
    
    public function addToOrderDetailsHistory($orderDetailsItem, $conn) {
        $query = "INSERT INTO fruitstore.orderhistorydetails (orderHistoryID, productID, productQty) VALUES (" .
            $orderDetailsItem->getOrderID() . ", " .
            $orderDetailsItem->getProductID() . ", " .
            $orderDetailsItem->getProductQty() . ")";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Add to Orders hisstory details Error: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    
    public function getPreviousOrder($userID, $conn) {
        //select previous order
        $query = "SELECT * FROM fruitstore.orders WHERE userID = $userID AND delivered = 0 ORDER BY dateOrdered ASC LIMIT 1";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error getting previous order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    public function deliverPreviousOrder($orderID, $conn) {
        //update order to deliver
        $query = "UPDATE fruitstore.orders SET delivered = 1 WHERE orderID = $orderID";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error setting delivered: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    public function getOrderByID($orderID, $conn) {
        $query = "SELECT * FROM fruitstore.orderdetails WHERE orderID = $orderID";
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
 
    
    
    
   
    public function getOrdersInside($dateBegin, $dateEnd, $userID, $conn) {
        $query = "SELECT * FROM fruitstore.orders WHERE dateOrdered BETWEEN '" . $dateBegin->format('Y-m-d H:i:s') . "' AND '" . $dateEnd->format('Y-m-d H:i:s') ."';";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    
    public function updateOrderDelivery($orderID, $conn) {
        $query = "UPDATE fruitstore.orders SET delivered = delivered + 1 WHERE orderID = $orderID";
        
        $result = $conn->query($query);

        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    
    public function getCurrentOrders($userID, $conn) {
        $query = "SELECT * FROM fruitstore.orders WHERE userID = $userID AND delivered < 4";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    
    
    public function getDeliveredOrders($userID, $conn) {
        $query = "SELECT * FROM fruitstore.orders WHERE userID = $userID AND delivered = 4";
        
        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
    
    
    
    public function setDeliverToReturn($orderID, $conn) {
        $query = "UPDATE fruitstore.orders SET delivered = 5 WHERE orderID = $orderID";

        $result = $conn->query($query);
        
        if ($conn->error) {
            echo "<h1 class='bg-danger text-white '> Error finding order: </br> " . $conn->error . "</h1>";
            die();
        }
        
        if (!$result) {
            return false;
        }
        
        return $result;
    }
}









