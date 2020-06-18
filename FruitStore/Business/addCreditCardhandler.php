<?php
session_start();
require_once 'classes/creditCardBusiness.php';
require_once '../Data/models/creditCard.php';

$business = new creditCardBusiness();
$firstname = $_POST['firstname'];
$middleInitial = $_POST['middleInitial'];
$lastname = $_POST['lastname'];
$ccnum1 = $_POST['creditCardNumber1'];
$ccnum2 = $_POST['creditCardNumber2'];
$ccnum3 = $_POST['creditCardNumber3'];
$ccnum4 = $_POST['creditCardNumber4'];
$expMonth = $_POST['month'];
$expYear = $_POST['year'];
$cvv = $_POST['cvv'];
$isPrimaryCard = 0;

if ($_POST['primaryCheck'])
    $isPrimaryCard = 1;

$creditCardNumber = $ccnum1 . "-" . $ccnum2 . "-" . $ccnum3 . "-" . $ccnum4;

$creditCard = new creditCard($_SESSION['username'], $creditCardNumber, $firstname, $middleInitial, $lastname, $expMonth, $expYear, $cvv, 0);

$result = $business->addToCreditCards($creditCard);

if ($isPrimaryCard) {
    $result = $business->updatePrimary($_SESSION['username'], $creditCardNumber);
    if (!$result){
        $_SESSION['creditFailure'] = "Failed to save card as primary.";
        header("location: /FruitStore/presentation/addCreditCard.php");
        die();
    }
}

if ($result) {
    $_SESSION['creditSuccess'] = "Card Added Success";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
} else {
    $_SESSION['creditFailure'] = "Failed to add card";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
}
    
?>