<?php

// Databases are the backbone of most web applications, allowing you to store, retrieve, and manipulate data efficiently.
// Let's explore how PHP interacts with MySQL, one of the most popular database systems.

// 1. Database Connection
// The first step in working with databases is establishing a connection. PHP offers multiple ways to connect to MySQL databases.

// Using = MySQLi (MySQLimproved)
// Basic batabase connection with MySQLi (procedural style)
/*
$host = "localhost";
$username = "root";
$password = "";
$database = "sample_db";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);
*/

/*
// Check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/

/*
// Object-oriented style with MySQLi
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli -> connect_errno){
    die("Connection failed: " . $mysqli ->connect_error);
}
echo "Connection successful";

// When done
$mysqli -> close();
*/


// Using PDO (PHP Data Objects)
// PDO provides a consistent interphase with multiple database systems, not MySQL.

// Database connection with PDO
$host = "localhost";
$username = "root";
$password = "";
$database = "rand_info";
$charset = "utf8mb4"; // Use proper character encoding

// To establish everything in a PDO we put it in a try catch i.e
try{
    // Create a connection string
    $dsn = "mysql:host=$host; dbname = $database; charset = $charset";

    // Next create connection options
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exception on errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Return associative arrays by default
        PDO::ATTR_EMULATE_PREPARES => false, // Use real prepaed statements
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);

    echo "Connection successful";

} catch (PDOException $e){
    // Handle connection errors
    die("Connection failed: " . $e -> getMessage());
}


?>