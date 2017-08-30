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
        $post = $this->post->getById($this->request->getParameter("id"));
        $comments = $this->comment->getPostComments($this->request->getParameter("id"));

        $this->genererVue(
            [
                'post' => $post,
                'comments' => $comments,
                'util' => $this->util
            ]
        );
    }
}