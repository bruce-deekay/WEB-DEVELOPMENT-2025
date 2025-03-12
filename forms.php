<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
</head>
<body>
    <h1>Contact us</h1>
    <form action="process_form.php" method = "POST">
        <div>
            <label for="Name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
        </div>
        <div>
            <label for="Email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>
        <div>
            <label for="Message">Message:</label>
            <textarea id="message" name="message" placeholder="Talk to us" rows="5"></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>