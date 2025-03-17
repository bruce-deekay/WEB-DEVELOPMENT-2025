<?php

// Databases are the backbone of most web applications, allowing you to store, retrieve, and manipulate data efficiently.
// Let's explore how PHP interacts with MySQL, one of the most popular database systems.

// 1. Database Connection
// The first step in working with databases is establishing a connection. PHP offers multiple ways to connect to MySQL databases.

// Using = MySQLi (MySQLimproved)
// Basic batabase connection with MySQLi (procedural style)
$host = "localhost";
$username = "root";
$password = "";
$database = "sample_db";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

/*
// Check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/

// Object-oriented style with MySQLi
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli -> connect_errno){
    die("Connection failed: " . $mysqli ->connect_error);
}
echo "Connection successful";

// When done
$mysqli -> close();

// Using PDO (PHP Data Objects)

?>