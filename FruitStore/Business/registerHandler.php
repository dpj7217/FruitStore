<?php
    session_start();

    unset($_SESSION['registerErrorMesssage']);
    unset($_SESSION['SuccessMessage']);

    $conn = new mysqli("localhost", "root", "root", "fruitstore");
    
    if ($conn->connect_errno) {
        $_SESSION['SqlError'] = $conn->connect_errno . ": " . $conn->connect_error;
        header("Location: presentation/sqlerror.php");
    }

    if (empty($_POST['firstname']) || empty($_POST['middleInitial']) || empty($_POST['lastname']) || empty($_POST['regUsername']) || empty($_POST['regPassword']) || empty($_POST['passwordconf']) || empty($_POST['email'])) {
        $_SESSION['registerErrorMessage'] = "All Fields Required";
        header("Location: /FruitStore/presentation/loginRegister.php");
        die();
    }
    
    
    $firstname = $_POST['firstname'];
    $middleInitial = $_POST['middleInitial'];
    $lastname = $_POST['lastname'];
    $username = $_POST['regUsername'];
    $password = $_POST['regPassword'];
    $passwordConf = $_POST['passwordconf'];
    $email = $_POST['email'];
    
    if ($password != $passwordConf) {
        $_SESSION['registerErrorMessage'] = "The passwords don't match. Please try again.";
        header("Location: /FruitStore/presentation/loginRegister.php");
        die();
    }
    
    $statement = $conn->prepare("INSERT INTO fruitstore.user (firstname, middleInitial, lastname, username, password, email, isAdmin) VALUES ('". $firstname . "', '" . $middleInitial ."', '" . $lastname."', '" . $username ."', '" . $password ."', '" . $email . "', 0)");
    $statement->execute();

    
    $_SESSION['successMessage'] = "Welcome " . $firstname . " " . $lastname . "! Please login to proceed";
    $_SESSION['username'] = $username;
    unset($_SESSION['registerErrorMessage']);
    header("Location: /FruitStore/presentation/loginRegister.php");
    die();
?>