<?php

require_once 'Controller.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'app/Util.php';

class PostController extends Controller
{
    private $post;
    private $comment;
    private $util;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
        $this->util = new Util();
    }

    public function index()
    {
        $posts = $this->post->getAll();
        $this->genererVue(['posts' => $posts]);
    }

    public function show()
    {
        if ($this->request->parameterExist("id")) {
            $postId = $this->request->getParameter("id");
        } else {
            $postId = $this->post->getLastPostId();
        }

        $post = $this->post->getById($postId);
        $comments = $this->comment->getPostComments($postId);

        $this->genererVue(
            [
                'post' => $post,
                'comments' => $comments,
                'util' => $this->util
            ]
        );
    }
    
    public function addPost()
    {
        if ($this->request->parameterExist("author") && $this->request->parameterExist("content")) {
            $author = $this->request->getParameter("author");
            $content = $this->request->getParameter("content");

            $html = "<div>
                    <div class='user'>Author:: " . $author . "</div>
                    <div class='post'>
                    " . $content . "
                    </div>
                    </div><br>";
            $newPostData = json_encode(["status" => 1, "html" => $html]);
            $data = [
                'author' => $author,
                'content' => $content,
            ];

            try {
                $this->post->addPost($data);
                echo $newPostData;
            } catch (\Exception $e) {
                echo json_encode(["status" => 0, "error-message" => $e->getMessage()]);
            }
        }
    }
}