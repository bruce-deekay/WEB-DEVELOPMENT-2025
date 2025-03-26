<?php 

$pageTitle = 'Home';

require_once 'includes/header.php';

// Instantiate Post
$post = new Post();

// Get Posts
$posts = $post->getPosts();

?>

<h1>Latest Blog Posts</h1>

<div class="posts">
    <?php foreach($posts as $post) : ?>
        <article class="post-tag">
            <header class="post-header">
                <h2>
                    <a href="<?php echo BASE_URL;?>/post.php/slug=<?Php $post->slug; ?>">
                        <?php echo $post->title;?>
                    </a>
                </h2>
                <div class="post-meta">
                    <span>Posted by <?php $post->username; ?></span>
                    <span>On <?php date('F j, Y', strtotime ($post->created_at));?></span>
                    <span>In <a href="<?php echo BASE_URL; ?>/category.php?slug+<?php echo strtolower(str_replace(' ', '-', $post->category)) ?>"><php echo $post->category; ?></a></span>
                </div>
            </header>
            <div class="post-excerpt">
                <?php 
                    // Show excerpt (first 200 characters of the content)
                    echo substr(strip_tags($post->content), 0, 200) . '...';
                ?>
                <!-- the elipsis(...) are used as a link if a person wants to read more. -->
            </div>
            <footer class="post-footer">
                <a href="<?php echo BASE_URL; ?>/post.php?slug+<?php echo $post->slug; ?>" class="read-more">Read More</a>
            </footer>
        </article>
    <?php endforeach; ?>
</div>