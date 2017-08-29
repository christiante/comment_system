<h2>Post view</h2><br/>

<b><?php echo $post->author; ?></b><br/>
<p><?php echo $post->content; ?></p>

<?php
foreach($comments as $comment) { ?>
    <div class="col-lg-4">
        <b>User: <?php echo $comment->user; ?></b><br/>

        <?php echo $comment->text; ?><br/>
        <?php echo $comment->date; ?><br/>
    </div>

<?php } ?>