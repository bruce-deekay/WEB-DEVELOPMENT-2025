<?php

$pageTitle = 'Register';
 require_once 'includes/header.php';

 // Check if user is already logged in
 if(isset($_SESSION['user_id'])){
    header('Location: ' . BASE_URL);
    exit;
 }

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Validate form
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $errors = [];

    if (empty($username)){
        $errors[] = 'Username is required';
    }
    if (empty($email)){
        $errors[] = 'email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Invalid email format';
    }

    if (empty($password)){
        $errors[] = 'Password is required';
    } elseif ($password < 6){
        $errors[] = 'Password must be at least 6 characters';
    }

    if($password != $confirm_password){
        $errors[] = 'Passwords do not match';
    }

    // If no errors, create new user
    if (empty($errors)){
        // Instantiate user
        $user = new User();

        // Check if username or email already exists
        if($user->findUserByUsername($username)){
            $errors[]='Username is already taken';
        } elseif ($user->findUserByEmail($email)){
            $errors[] = 'Email already regitered';
        } else {
            // Register user
            $userData = [
                'username' => $username, 'email'=>$email, 'password'=>$password
            ];

            if ($user->register($userData)){
                // Set success message
                $_SESSION['success_message']='You are now registered! Please login';

                // Redirect to login page
                header('Location: ' . BASE_URL . '/login.php'); #http://localhost/blog/login.php
                exit;
            } else {
                $errors[]= 'Something went wrong. Please try again.';
            }
        }
    }
}

?>

<div class="auth-form">
    <h1>Register</h1>

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
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Register</button>
        </div>
    </form>

    <p>Already have an account? <a href="<?php echo BASE_URL; ?>/login.php">Login</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>