<?php

require_once 'Controller.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';

class PostController extends Controller
{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    public function index()
    {
        $posts = $this->post->getAll();
        $this->genererVue(array('posts' => $posts));
    }

    public function show()
    {
        $post = $this->post->getById($this->request->getParameter("id"));
        $comments = $this->comment->getPostComments($this->request->getParameter("id"));

        $this->genererVue(array('post' => $post,
            'comments' => $comments)
        );
    }
}