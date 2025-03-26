<?php 

require_once 'includes/header.php';

// Check if the slug is set
if (!isset($_GET['slug'])){
    header('Location: ' . BASE_URL);
    exit;
}

$slug = $_GET['slug'];

// Instantiate Post and Comment
$postObj = new Post();
$comment = new Comment();

// Get post
$post = $postObj->getPostBySlug();

// Check if post exists
if(!$post){
    header('Location: ' . BASE_URL);
}

// Set page title
$pageTitle = $post->title;

// Get Comments
$comments - $commentObj->getCommentsByPost($post->id);

// Process comment form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])){
    // Validate comment
    if (empty($_POST['content'])){
        $error = 'Comment cannot be empty';
    } else {
        // Prepare comment data
        $commentData = [
            'content' => htmlspecialchars($_POST['content']),
            'post_id' => $post->id,
            'user_id' => $_SESSION['user_id']
        ];

        // Add comment
        if ($commentObj->addComment($commentData)){
            // Redirect to refresh the page and update comments
            header('Location: ' . BASE_URL . '/post.php?slug=' . $slug);
            exit;
        } else {
            $error = 'Something went wrong';
        }
    }
}

?>