<?php

$pageTitle = 'Login';
require_once 'includes/header.php';

// Check if the user is already logged in using the session superglobal variable
if (isset($_SESSION['user_id'])){
    header('Location: ' . BASE_URL);
    exit;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Validate form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $errors = [];

    if (empty($username)){
        $error[] = 'Username is required';
    }
    if (empty($password)){
        $error[] = 'Password is required';
    }

    // If no errors, attempt login
    if (empty($errors)){
        // Instantiate User
        $user = new User();

        // Attempt login
        $loggedInUser = $user->login($username, $password);

        // Check for successful login
        if ($loggedInUser){
            // Create session variables
            $_SESSION['user_id'] = $loggedInUser->id;
            $_SESSION['user_name'] = $loggedInUser->username;
            $_SESSION['user_email'] = $loggedInUser->email;
            $_SESSION['user_role'] = $loggedInUser->role;

            // Redirect to homepage
            header('Location: ' . BASE_URL);
            exit;
        } else {
            $errors[] = 'Invalid username or password';
        }
    }
}

?>

<div class="auth-form">
    <h1>Login</h1>

    <?php if(isset($errors) && !empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>


    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Login</button>
        </div>
    </form>

    <p>Don't have a password? <a href="<?php echo BASE_URL; ?>/register.php">Register here</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>