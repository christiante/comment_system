<h2>Hi there! <?php echo $first_name . ' ' . $last_name; ?>!</h2>
<hr/>
<!-- Comments box -->
<div class="page-container">
	<form action="" method="post" class="main">
		<label>Write your comment here</label>
		<textarea class="form-control" name="comment" id="comment" required></textarea>
		<input type="submit" class="btn btn-default" name="new_comment" value="Post comment">
	</form>

	<?php get_total(); ?>
	<?php get_comments(); ?>
</div>