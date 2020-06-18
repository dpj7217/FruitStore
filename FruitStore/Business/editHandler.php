<?php
session_start();
require_once 'classes/userBusiness.php';
require_once '../Data/models/user.php';

unset($_SESSION['editSucess']);
unset($_SESSION['editFailure']);


$business = new userBusiness();

$oldID = $_POST['userID'];
$firstname = $_POST['firstname'];
$middleInitial = $_POST['middleInitial'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$isAdmin = $_POST['isAdmin'];

$user = new user($firstname, $middleInitial, $lastname, $username, $password, $email, $isAdmin);

$business->editUser($oldID, $user);
header('location: /FruitStore/Presentation/users.blade.php');
?>
