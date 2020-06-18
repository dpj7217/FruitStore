<?php
    session_start();

    $conn = new mysqli("localhost", "root", "root", "fruitstore");
    
    if ($conn->connect_errno) {
        $_SESSION['SqlError'] = $conn->connect_errno . ": " . $conn->connect_error;
        header("Location: /FruitStore/presentation/sqlerror.php");
        die();
    }
    
    
    if (empty($_POST['loginUsername']) || empty($_POST['loginPassword'])) {
        $_SESSION['loginErrorMessage'] = "All Fields Required";
        header("location: /FruitStore/presentation/loginRegister.php");
        die();
    }
        
    
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $query = "SELECT * FROM fruitstore.user WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $data = $conn->query($query);
    
    if ($data->num_rows >= 1) {
        unset($_SESSION['loginErrorMessage']);
        unset($_SESSION['successMessage']);
        
        while ($result = $data->fetch_array()) {
            if ($result['isAdmin']) {
                $_SESSION['username'] = $result['userID'];
                $_SESSION['admin'] = true;
                header("location: /FruitStore/index.php");
                
            } else {
                $_SESSION['username'] = $result['userID'];
                $_SESSION['admin'] = false;
                header("location: /FruitStore/index.php");
                die();
            }
        }
    } else {
        $_SESSION['loginErrorMessage'] = "No user like that found. Please try again.";
        header("location: /FruitStore/presentation/loginRegister.php");
        die();
    }
    