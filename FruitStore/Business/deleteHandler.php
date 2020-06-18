<?php
require_once 'classes/userBusiness.php';
session_start();

unset($_SESSION['deleteSuccess']);
unset($_SESSION['deleteFailure']);

$business = new userBusiness();
$id = $_POST['userID'];


$result = $business->deleteUser($id);

if ($result) {
    $_SESSION['deleteSuccess'] = "User #" . $id . " deleted successfully";
}
else {
    $_SESSION['deleteFailure'] = "Deletion of user #" . $id . " failed. Please try again.";
}

header("location: /FruitStore/presentation/users.blade.php");
?>