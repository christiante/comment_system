<h2>Post view</h2><br/>

<b><?php echo $post->author; ?></b><br/>
<p><?php echo $post->content; ?></p>
<form id="add-comment-form" method="post" action="">
    <p><label for="username">Username:</label><br />
        <input type="text" name="username" id="username" required="required" />
    </p>

    <p><label for="comment">Comment:</label><br />
        <textarea name="comment" id="comment" rows="5" cols="35" required="required"></textarea>
    </p>
    <p><input id="add-comment" type="button" name="add_submit" data-post-id="<?php echo $post->id; ?>" value="Add Comment"/></p>
    <input type="submit" id="submitBtn" name="submitBtn" style="display:none;">
</form>
<div class="comments-container">
<?php foreach($comments as $comment) { ?>
    <div class="col-lg-4 comment-box">
        <b>User: <?php echo $comment->user; ?></b><br/>

        <?php echo $comment->text; ?><br/>
        <?php echo $util->timeElapsedString($comment->date); ?><br/>
    </div>
<?php } ?>
</div>
