<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['successMessage'] = "You must be logged in to access this page. Please login to continue.";
    header('location: loginRegister.php');
    die();
}
?>