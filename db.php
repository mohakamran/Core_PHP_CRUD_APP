<?php
    $host = "localhost"; // Database host (e.g., "localhost")
    $username = "root"; // Database username
    $password = ""; // Database password
    $database = "project"; // Database name

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
?>
