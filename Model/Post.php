<?php

require_once "app/Db.php";

	class Post
	{
        protected $db;

        public function __construct()
        {
            $this->db = new Db();
        }

        /*public function get($iOffset, $iLimit)
        {
            $oStmt = $this->oDb->prepare('SELECT * FROM Posts ORDER BY createdDate DESC LIMIT :offset, :limit');
            $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
            $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
            $oStmt->execute();
            return $oStmt->fetchAll(\PDO::FETCH_OBJ);
        }*/

        public function getAll()
        {
            $response = $this->db->query('SELECT * FROM posts ORDER BY author DESC');

            return $response->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getById($id)
        {
            $request = $this->db->prepare('SELECT * FROM posts WHERE id = :postId LIMIT 1');
            $request->bindParam(':postId', $id, \PDO::PARAM_INT);
            $request->execute();
            return $request->fetch(\PDO::FETCH_OBJ);
        }

		/*public static function find($id) {
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
		}*/
	}
