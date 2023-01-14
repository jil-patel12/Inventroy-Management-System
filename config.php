<?php 
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dataBaseName = "electronics_ims";
    $conn = new mysqli($hostName, $userName, $password, $dataBaseName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>