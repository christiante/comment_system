<h2>Censored list</h2><br/>


<?php foreach($comments as $comment) { ?>

	<div class="col-lg-4">
		<b>Author: <?php echo $comment->user; ?></b><br/>
                <?php echo $comment->text; ?><br/>
                <?php echo $comment->date; ?><br/>

	</div>

<?php } ?>