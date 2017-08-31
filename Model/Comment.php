<?php

require_once "app/Db.php";

/**
 * Class Comment
 */
class Comment
{
    /**
     * @var Db
     */
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     * @param $postId
     * @return array
     */
    public function getPostComments($postId)
    {
        $request = $this->db->prepare('SELECT * FROM comments WHERE post_id = :postId AND is_spam = 0 ORDER BY date DESC');
        $request->bindParam(':postId', $postId, \PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $data
     * @return bool
     */
    public function addComment($data)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO comments (user, text, date, post_id, is_spam) VALUES (:user, :text, :date, :post_id, :is_spam)'
        );
        return $stmt->execute($data);
    }

    /**
     * @return array
     */
    public function getCommentCensored()
    {
        $response = $this->db->query('SELECT * FROM comments WHERE is_spam = 1');

        return $response->fetchAll(\PDO::FETCH_OBJ);
    }
}