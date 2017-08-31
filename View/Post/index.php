<h2>Post list</h2>
<?php
    if (!empty($posts)) { ?>
    <div class="post-container">
        <?php foreach ($posts as $post) { ?>
            <div class="col-lg-4">
                <div class="user">Author: <?php echo $post->author; ?></div>
                <div class="post"><?php echo substr($post->content, 0, 100) . '...'; ?></div>
                <a href='?controller=post&action=show&id=<?php echo $post->id; ?>'>Read more and leave comment...</a>
            </div>


        <?php }
    ?>
    </div>
    <?php } else { ?>
    <p>No Post Available!<p>
    <?php
}
?>

<h2>Add New Post</h2>
<form id="add-post-form" method="post" action="">
    <div class="form_settings">
        <p><label for="author">Author:</label><br />
            <input type="text" name="author" id="author" required="required" />
        </p>
        <p><label for="content">Your Post:</label><br />
            <textarea name="post-content" id="post-content" rows="5" cols="35" required="required"></textarea>
        </p>
        <p><input id="add-post" class="submit" type="button" name="post_submit" value="Add Post"/></p>
    </div>
</form>