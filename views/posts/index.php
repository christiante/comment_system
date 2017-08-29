<h2>Posts list</h2><br/>


<?php foreach($posts as $post) { ?>

	<div class="col-lg-4">
		<b>Author: <?php echo $post->author; ?></b><br/>
		
		<?php echo $post->content_exerp; ?><br/>
		
		<a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Read more...</a>
	</div>

<?php } ?>