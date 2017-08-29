<?php

	require_once('app/connection.php');
	require_once('app/includes.php');



	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action     = $_GET['action'];
	} else {
		$controller = 'pages';
		$action     = 'home';
	}



	require_once('views/layout.php');

?>