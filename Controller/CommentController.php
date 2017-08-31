<?php

require_once 'Controller.php';
require_once 'Model/Comment.php';
require_once 'security/SecurityChecker.php';
require_once 'app/Util.php';

/**
 * Class CommentController
 */
class CommentController extends Controller
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var SecurityChecker
     */
    private $securityChecker;

    /**
     * @var Util
     */
    private $util;

    /**
     *
     */
    public function __construct()
    {
        $this->comment = new Comment();
        $this->securityChecker = new SecurityChecker();
        $this->util = new Util();
    }

    public function index()
    {

    }

    /**
     *
     */
    public function addComment()
    {
        if ($this->request->parameterExist("id") && $this->request->parameterExist("comment")
            && $this->request->parameterExist("username")
        ) {
            $postId = $this->request->getParameter("id");
            $comment = $this->request->getParameter("comment");
            $username = $this->request->getParameter("username");
            $date = new \DateTime('now');
            $is_spam = $this->securityChecker->wordsFilter($comment) == "" ? 0 : 1;
            $html = "<div class=\"comment-box\">
                        <b>User: " . $username . "</b><br/>
                                " . $comment . "<br/>" . $this->util->timeElapsedString('now') . "<br/>
                     </div>";
            $filteredCommentData = json_encode(["status" => 1, "html" => $html]);
            $censoredCommentData = json_encode(["status" => 0]);
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

    /**
     *
     */
    public function listsCommentCensored()
    {
        $comments = $this->comment->getCommentCensored();
        $this->genererVue(array('comments' => $comments));
    }
}