<?php
    include 'dbconfig.php';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    /*
    $resultSet = $stmt->get_result();
    $result = $resultSet->fetchAll(PDO::FETCH_ASSOC);
    $json=json_encode($results);
    */
    
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