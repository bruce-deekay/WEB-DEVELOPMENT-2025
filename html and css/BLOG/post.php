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
$post = $postObj->getSlug($slug);

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

<article class="single-post">
    <header class="post-header">
        <h1><?php echo $post->title; ?></h1>
        <div class="post-meta">
        <span>Posted by <?php $post->username; ?></span>
                    <span>On <?php date('F j, Y', strtotime ($post->created_at));?></span>
                    <span>In <a href="<?php echo BASE_URL; ?>/category.php?slug+<?php echo strtolower(str_replace(' ', '-', $post->category)) ?>"><php echo $post->category; ?></a></span>
                
        </div>
    </header>
    <div class="post-content">
        <?php echo nl2br($post->content);?>
    </div>
</article>

<section class="comments-section">
    <h2>Comments(<?php echo count ($comments); ?></h2>

    <?php if(isset($_SESSION['user_id'])) : ?>
        <div class="comment-form">
            <h3>Leave a comment</h3>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error;?></div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                <textarea name="content" rows="4" placeholder="Write your comment here..." id="" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Submit Comment</button>
                </div>
                
            </form>
        </div>
    <?php else: ?>
        <p><a href="<?php echo BASE_URL; ?>/login.php">Login</a>to leave a comment</p>
    <?php endif; ?>

    <div class="comments-list">
        <?php if (count($comments)>0) : ?>
            <?php foreach($comments as $comment) : ?>
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author"><?php echo $comment->username; ?></span>
                        <span class="comment-date"><?php echo date('F j, Y \a\t g:i:a', strtotime($comment->created_at)); ?></span>
                    </div>
                    <div class="comment-content">
                        <?php echo nl2br($comment->content); ?>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <p>No comments yet. Be the first to comment!</p>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>