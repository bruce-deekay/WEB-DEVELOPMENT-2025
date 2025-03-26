<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?php echo isset($pageTitle) ? $pageTitle : 'Home'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?> /assets/css/style.css">
    </title>
</head>
<body>
    <header class="site-header">
        <div class="continer">
            <div class="site-logo">
                <a href="<?php echo BASE_URL; ?>">My Blog</a>
            </div>
            <nav class="site-nav">
                <ul>
                    <li><a href="<a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <?php
                    // Display categories in navigation
                    $category=new Category();
                    $categories = $category->getCategories();
                    foreach ($categories as $cat) : ?>
                    <li>
                        <a href="<?php echo BASE_URL;?>/category.php? slug=<?php echo $cat->slug;?>">
                            <php echo $cat->name; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="user-nav">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <span>Welcome, <?php echo $_SESSION['user_name']; ?>
                    </span>
                    <?php if ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role']=='author') : ?>
                        <a href="<?php echo BASE_URL; ?>/admin/manage-posts.php">Dashboard</a>
                        <?php endif; ?>
                        < a href="<?php echo BASE_URL; ?>/logout.php">Logout</a>
                <php else : ?>
                            < a href="<?php echo BASE_URL; ?>/login.php">Login</a>
                            < a href="<?php echo BASE_URL; ?>/register.php">Register</a>
                <?php endif; ?>

            </div>
        </div>

    </header>
    <main class="site-content">
        <div class="container">

       