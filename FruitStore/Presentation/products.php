<head>
	<title>FruitStore | All Products</title>
</head>
<?php
require_once 'header.php';
require_once '../Business/classes/productBusiness.php';

if (!$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You do not have the required permissions to access this page. Please Login as an admin to access this page";
    header("location: loginRegister.php");
    die();
}

$business = new productBusiness();
$data = $business->findAllForAllProducts();

if ($data) {
   include '../presentation/_showProducts.php'; 
} else {
    echo "<div class='p-2 m-2 bg-danger text-white'>
               <p>No products found</p>
          </div>";
}

