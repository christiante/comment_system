<?php

require_once 'Controller.php';
require_once 'Model/Comment.php';
require_once 'security/SecurityChecker.php';
require_once 'app/Util.php';

class CommentController extends Controller
{
    private $comment;
    private $securityChecker;
    private $util;

    public function __construct()
    {
        $this->comment = new Comment();
        $this->securityChecker = new SecurityChecker();
        $this->util = new Util();
    }

    public function index()
    {
        //$posts = $this->post->getAll();
        //$this->genererVue(array('posts' => $posts));
    }

    public function addComment()
    {
        if (!empty($this->request->getParameter("id")) && !empty($this->request->getParameter("comment"))
            && !empty($this->request->getParameter("username"))
        ) {
            $postId = $this->request->getParameter("id");
            $comment = $this->request->getParameter("comment");
            $username = $this->request->getParameter("username");
            $date = new \DateTime('now');
            $is_spam = $this->securityChecker->wordsFilter($comment) == "" ? 0 : 1;
            $html = "<div class=\"col-lg-4 comment-box\">
                                <b>User: " . $username . "</b><br/>
                                " . $comment . "<br/>
            " . $this->util->timeElapsedString('now') . "<br/></div>";
            $filteredCommentData = json_encode(["status" => 1, "html" => $html]);
            $htmlCensured = "<script>alert('Sorry, your comment containt censored word! It will not shown live.');location.reload();</script>";
            $censoredCommentData = json_encode(["status" => 0, "html" => $htmlCensured]);
            $commentData = $this->securityChecker->wordsFilter($comment) == "" ? $filteredCommentData : $censoredCommentData;
            $comment = $this->securityChecker->wordsFilter($comment) == "" ? $comment : $this->securityChecker->wordsFilter($comment);
            $data = [
                'user' => $username,
                'text' => $comment,
                'date' => $date->format('Y-m-d H:i:s'),
                'post_id' => $postId,
                'is_spam' => $is_spam,
            ];

            try {
                $this->comment->addComment($data);
                echo $commentData;
            } catch (\Exception $e) {
                echo json_encode(["status" => 0, "error-message" => $e->getMessage()]);
            }
        }
    }
    
    public function listsCommentCensored()
    {
        $comments = $this->comment->getCommentCensored();
        $this->genererVue(array('comments' => $comments));
    }
}