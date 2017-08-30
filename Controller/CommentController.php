<?php

require_once 'Controller.php';
require_once 'Model/Comment.php';

class CommentController extends Controller
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function index()
    {
        //$posts = $this->post->getAll();
        //$this->genererVue(array('posts' => $posts));
    }

    public function addComment()
    {
        $postId = $this->request->getParameter("id");
        $comment = $this->request->getParameter("comment");
        $username = $this->request->getParameter("username");
        $date = '2017-08-30 00:00:00';
        $is_spam = 0;

        if(!empty($postId) && !empty($comment) && !empty($username)) {
            $data = [
                'user' => $username,
                'text' => $comment,
                'date' => $date,
                'post_id' => $postId,
                'is_spam' => $is_spam,
            ];

            try {
                $this->comment->addComment($data);
                $html = "<div class=\"col-lg-4 comment-box\">
                            <b>User: " .$username."</b><br/>
                            ".$comment."<br/>
        ".$date."<br/></div>";
                echo json_encode(["status" => 1, "html" => $html]);
            } catch (\Exception $e) {
                echo json_encode(["status" => 0, "error-message" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["status" => 0]);
        }
    }
}