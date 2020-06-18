<?php
require_once 'header.php';
require_once '../Business/classes/orderBusiness.php';
require_once '../Business/classes/creditCardBusiness.php';
require_once '../Business/classes/userBusiness.php';
require_once '../Business/classes/productBusiness.php';

if (!isset($_SESSION['username']) || !$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You dont have permission to access this page";
    header("location: loginRegister.php");
    die();
}

$business = new orderBusiness();
$creditCardBusiness = new creditCardBusiness();
$userBusiness = new userBusiness();
$productBusiness = new productBusiness();
$dateBegin = new dateTime($_GET['beginDate']);
$dateEnd = new dateTime($_GET['endDate']);

$dateBegin->setTime(24, 0);
$dateEnd->setTime(23, 59);

if ($dateBegin > $dateEnd) {
    $_SESSION['salesReportFailure'] = "Your begin date is after your end date. Please try again.";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
}

$data = $business->getOrdersInside($dateBegin, $dateEnd, $_SESSION['username']);

if ($data->num_rows > 0) {
    while($row = $data->fetch_assoc()) {
        $orderDetails = $business->getOrderByID($row['orderID']);
        while($order = $orderDetails->fetch_assoc()) {
            $product = $productBusiness->findByID($order['productID']);
            $product = $product->fetch_assoc();
            $creditCard = $creditCardBusiness->findByID($row['creditCardID']);
            $creditCard = $creditCard->fetch_assoc();
            $user = $userBusiness->findByID($row['userID']);
            $user = $user->fetch_assoc();
            $jsonData = array(
                "OrderID" => $row['orderID'], 
                "Product Name" => $product['name'], 
                "Description" => $product['description'], 
                "Product Quantity" => $order['productQty'], 
                "Credit Card ID" => $creditCard['creditCardID'],
                "CC First Name" => $creditCard['firstname'],
                "CC Last Name" => $creditCard['lastname'],
                "CC Number" => $creditCard['creditCardNumber'],
                "Username" => $user['username'],
                "User's Name" => $user['firstname'] . " " . $user['lastname']
            );
            
            echo json_encode($jsonData);
            echo "<br/><br/>";
        }
    }
} else {
    $_SESSION['salesReportFailure'] = "No Orders found inside that date range.";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
}

?>