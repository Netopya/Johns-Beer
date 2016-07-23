<?php

    $id = $_GET['id'];
    $credits = $_GET['c'];

    include 'dbconfig.php';
    
    //header('Access-Control-Allow-Origin: *');  
     
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // prepare and bind
    $stmt = $conn->prepare("UPDATE Users SET credits=? WHERE id=?");
    $stmt->bind_param("sd", $credits, $id);
    
    
    $stmt->execute();
?>
