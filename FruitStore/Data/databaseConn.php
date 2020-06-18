<?php
    $conn = new mysqli("localhost", "root", "root", "fruitstore");
    
    if ($conn->connect_errno) {
        $_SESSION['SqlError'] = $conn->connect_errno . ": " . $conn->connect_error;
        header("Location: sqlerror.php");
    }

?>