<head>
	<title>FruitStore | All Users</title>
</head>
<?php
require_once 'header.php';
require_once '../Business/classes/userBusiness.php';

if (!$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You do not have the required permissions to access this page. Please Login as an admin to access this page";
    header("location: loginRegister.php");
    die();
}

$business = new userBusiness();
$data = $business->findAll();

if ($data) {
   include '../presentation/_showUsers.php'; 
} else {
    echo "<div class='p-2 m-2 bg-danger text-white'>
               <p>No users found</p>
          </div>";
}

