<?php
session_start();
require_once '../Data/models/user.php';
require_once 'classes/userBusiness.php';

unset($_SESSION['addUserError']);
unset($_SESSION['addUserSuccess']);

$business = new userBusiness();

$firstname = $_POST['firstname'];
$middleInitial = $_POST['middleInitial'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordconf = $_POST['passwordconf'];
$email = $_POST['email'];
$isAdmin = 0;

if ($_POST['isAdmin'])
    $isAdmin = 1;

if ($password != $passwordconf) {
    $_SESSION['addUserError'] = "Passwords do not match";
    header("location: /FruitStore/presentation/addUser.php");
    die();
}

$user = new user($firstname, $middleInitial, $lastname, $username, $password, $email, $isAdmin);

$result = $business->addUser($user);

if ($result) {
    $_SESSION['addUserSuccess'] = "User Added Successfully";
    header("location: /FruitStore/presentation/addUser.php");
    die();
} else {
    $_SESSION['addUserError'] = "Failed to add user";
    header("location: /FruitStore/presentation/addUser.php");
    die();
}

?>