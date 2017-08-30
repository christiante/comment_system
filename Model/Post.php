<?php

require_once "app/Db.php";

class Post
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

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

    public function getLastPostId()
    {
        $stmt = $this->db->query('SELECT MAX(id) FROM posts');
        $lastId = $stmt->fetchColumn();
        if (!empty($lastId)) {
            return $lastId;
        } else {
            $content = 'In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura
            calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius
            Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.';

            $this->addPost(['author' => 'Lorem', 'content' => $content]);
            $stmt = $this->db->query('SELECT MAX(id) FROM posts');
            $lastId = $stmt->fetchColumn();

            return $lastId;
        }
    }

    public function addPost($data)
    {
        $request = $this->db->prepare(
            'INSERT INTO posts (author, content) VALUES (:author, :content)'
        );
        return $request->execute($data);
    }
}
