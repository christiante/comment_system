<h2>Post list</h2>

<?php
    if (!empty($posts)) {
        foreach ($posts as $post) { ?>
        <div class="post-container">
            <div class="col-lg-4">
                <b>Author: <?php echo $post->author; ?></b><br/>

                <?php echo substr($post->content,0,100).'...'; ?><br/>

                <a href='?controller=post&action=show&id=<?php echo $post->id; ?>'>Read more...</a>
            </div>
        </div>

<?php
        }
    } else { ?>
        <p>No Post Available!<p>
    <?php
    }
?>

<h2>Add New Post</h2><br/>
<form id="add-post-form" method="post" action="">
    <p><label for="author">Author:</label><br />
    <input type="text" name="author" id="author" required="required" />
    </p>
    <p><label for="content">Your Post:</label><br />
        <textarea name="content" id="content" rows="5" cols="35" required="required"></textarea>
    </p>
    <p><input id="add-post" type="button" name="post_submit" value="Add Post"/></p>
    <input type="submit" id="submitBtnPost" name="submitBtnPost" style="display:none;">
</form>