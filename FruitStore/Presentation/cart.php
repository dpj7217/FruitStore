<head>
	<title>FruitStore | Cart</title>
</head>

<?php
require_once 'header.php';
require_once 'protectPage.php';
require_once '../Business/classes/cartBusiness.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['successMessage'] = "You must login to see items in your cart";
    header("location: loginRegister.php");
    die();
}

$business = new cartBusiness();
$userID = $_SESSION['username'];

$data = $business->findAll($userID);

if ($data->num_rows > 0) 
    include '_showCart.php';
else 
    echo "<div class='p-2 m-2 d-flex justify-content-center align-items-center'>
               <h3 class='bg-success rounded text-white' style='width: 45%; text-align: center; '>Add products to your cart to see them here</<h3>
          </div>";
?>
