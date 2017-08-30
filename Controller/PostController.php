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
        if (!empty($this->request->getParameter("author")) && !empty($this->request->getParameter("content"))) {          
            $author = $this->request->getParameter("author");
            $content = $this->request->getParameter("content");

            $html = "<div class=\"col-lg-4\">
                    <b>Author:: " . $author . "</b><br/>
                    " . $content . "<br/></div>";
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