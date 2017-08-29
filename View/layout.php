<!DOCTYPE html>
<html>

	<head>
		<title>Comment System</title>
		
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="views/css/global.css">
	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href='?controller=pages&action=home'>Comment System</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href='?controller=pages&action=home'>Home</a></li>
						<li><a href='?controller=posts&action=index'>Posts</a></li>
						<li><a href='?controller=pages&action=spamlist'>Spam list</a></li>
						<li><a href='?controller=broken&action=index'>Broken link</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</nav>
		</div>

		<div class="container">
			<?php require_once('app/routes.php'); ?>
		</div>

		<footer>
			Copyright © <?php echo date('Y') ?>
		</footer>
		
		
		
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="views/js/global.js"></script>
	</body>

</html>
