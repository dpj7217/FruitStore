<?php
require_once '../presentation/header.php';

unset($_SESSION['username']);

if (isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}

header("location: ../presentation/loginRegister.php");
?>