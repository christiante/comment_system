<h2>Post</h2>
<?php
  if (!empty($post)) {
?>
    <b><?php echo $post->author; ?></b><br/>
    <p><?php echo $post->content; ?></p>
    <h2>Comments</h2>
    <h5>Leave your comment below</h5>
    <form id="add-comment-form" method="post" action="">
        <div class="form_settings">
            <p><label for="username">Username:</label><br/>
                <input type="text" name="username" id="username" required="required"/>
            </p>
            <p>
                <label for="comment">Comment:</label><br/>
                <textarea name="comment" id="comment" rows="5" cols="35" required="required"></textarea>
            </p>
            <p>
                <input id="add-comment" type="button" name="add_submit" data-post-id="<?php echo $post->id; ?>"
                      value="Add Comment" class="submit"/>
            </p>
        </div>
    </form>
<div class="comments-container">
    <?php foreach ($comments as $comment) { ?>
        <div class="col-lg-4 comment-box">
            <div class="user">User: <?php echo $comment->user; ?></div>
            <div class="post"><?php echo $comment->text; ?></div>
            <div class="date"><?php echo $util->timeElapsedString($comment->date); ?></div>
        </div>
    <?php }
    } else { ?>
        <b>POST NOT FOUND!</b>
    <?php
    }
    ?>
</div>
