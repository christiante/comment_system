<?php

	class Post {
		// defined 3 public attributes
		// so that we can access them using $post->author directly
		public $id;
		public $author;
		public $content;
		public $content_exerp;

		
		
		public function __construct($id, $author, $content, $content_exerp) {
			$this->id      			= $id;
			$this->author  			= $author;
			$this->content 			= $content;
			$this->content_exerp 	= $content_exerp;
		}
		
		
		public static function all() {
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM posts');

			// creates a list of Post objects from the database results
			foreach($req->fetchAll() as $post) {
				$list[] = new Post(
					$post['id'], 
					$post['author'], 
					$post['content'],  
					$post['content_exerp']
				);
			}

			return $list;
		}

		
		
		public static function find($id) {
			$db 	= Db::getInstance();
			$id 	= intval($id);
			$req 	= $db->prepare('SELECT * FROM posts WHERE id = :id');
			
			$req->execute(array('id' => $id));
			$post = $req->fetch();

			return new Post(
				$post['id'], 
				$post['author'], 
				$post['content'], 
				$post['content_exerp']
			);
		}
	}

?>
