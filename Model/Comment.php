<?php

require_once "app/Db.php";

class Comment
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getPostComments($postId)
    {
        $request = $this->db->prepare('SELECT * FROM comments WHERE post_id = :postId ORDER BY date DESC');
        $request->bindParam(':postId', $postId, \PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(\PDO::FETCH_OBJ);
    }

    public function addComment($data)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO comments (user, text, date, post_id, is_spam) VALUES (:user, :text, :date, :post_id, :is_spam)'
        );
        return $stmt->execute($data);
    }
    
    public function getCommentCensored()
    {
        $response = $this->db->query('SELECT * FROM comments WHERE is_spam = 1');

        return $response->fetchAll(\PDO::FETCH_OBJ);
    }
}