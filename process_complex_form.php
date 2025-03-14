<?php

// GET vs POST methods
/*
GET method:
- Data is appended to the URL as querry parameters
- Limited amount of data can be sent (URL length restriction)
- Data is visible in the URL (not secure for sensitive information)
- Good for simple data retrieval, searching, filtering

POST method:
- Data is sent in the HTTP request body
- Can send much larger amounts if data
- Data is not visible in the URL (more secure)
- Required for file uploads
- Used for operations that change data

*/

// Processing different form input types
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Text input
    $username = $_POST['username'] ?? "";

    // Password
    $password = $_POST['password'] ?? "";

    // Checkbox (will be set only if checked)
    $subscribe = isset($_POST['subscribe']) ? true : false;

    // Radio button
    $gender = $_POST['gender'] ?? ""; // Will contain selected gender

    // Select dropdown (Country)
    $country = $_POST['country'] ?? "";

    // Multi-select (returns an array)
    $interests = $_POST['interests'] ?? [];

    // Hidden field
    $formId = $_POST["form_id"] ?? "";

    // Displaying results for demonstration
    echo "Username: $username <br>";
    echo "Subscribed: " . ($subscribe ? "yes" : "no") . "<br>";
    echo "Gender: $gender <br>";
    echo "Country: $country <br>";
    echo "Interests: " . implode(", ", $interests) . "<br>";
    echo "Form ID: $formId <br>";
}
/*
// Handling GET requests
// process_search.php?query=php&category=tutorials
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $searchQuery = $_GET["query"] ?? "";
    $category = $_GET["category"] ?? "";

    echo "Searching for '$searchQuery' in category '$category' <br>";
}
*/
?>