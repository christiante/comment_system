<h2>Censored Comment list</h2>
<?php foreach($comments as $comment) { ?>
	<div class="col-lg-4">
        <div class="user">User: <?php echo $comment->user; ?></div>
        <div><?php echo html_entity_decode($comment->text); ?></div>
        <div class="date"><?php echo $comment->date; ?></div>
	</div>
<?php } ?>