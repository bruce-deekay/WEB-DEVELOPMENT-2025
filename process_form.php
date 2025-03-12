<?php

// Check if the form was submitted via post

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    // Retrieving form data
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $message = $_POST["message"] ?? "";

    // Basic validation
    $errors = [];

    if (empty($name)){
        $errors[] = "Name is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format";
    } elseif (empty($message)){
        $errors[] = "Message is required";
    } 

    // Process the form if no errors
    if (empty($errors)){
        // In a real application, you might:
        # - Send an email
        # - Save to a database
        # - Log the submission

        echo"Thankyou. $name! Your message has been received.";
    } else {
        // Display error
        echo "<h2> Please correct the following errors:</h2>";
        echo "<ul>";

        foreach ($errors as $error){
            echo "<li> $error </li>";
        }
        echo "</ul>";
        echo "<a href = 'javascript:history.back()'> Go back and try again </a>";
    }

} else {
    // If someone tries to access this file directly without submitting the form
    echo "Access denied. Please submit the form";
}

?>