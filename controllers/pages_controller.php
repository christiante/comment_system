<?php

	class PagesController {
		
		public function home() {
			$first_name = 'Kamran';
			$last_name  = 'Yakub';
			require_once('views/pages/home.php');
		}
		
		public function spamlist() {
			require_once('views/pages/spamlist.php');
		}

		public function error() {
			require_once('views/pages/error.php');
		}
		
	}

?>