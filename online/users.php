<?php
    include 'dbconfig.php';
    
    header('Access-Control-Allow-Origin: *');  
     
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    
    $stmt->bind_result($id, $name, $time, $picture, $credits);
    
    $results = array();
    
    while ($stmt->fetch()) {
        $results[$id] = array(
                "name" => $name,
                "picture" => $picture,
                "credits" => $credits
        );
    }
    
    echo(json_encode($results));
?>