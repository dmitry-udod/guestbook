<?php

namespace controllers;

use models\Post;
use controllers\BaseController;
use core\Db;

class PostsController extends BaseController
{
    /**
     * Get all posts
     *
     * @return mixed
     */
    public function all()
    {
        $posts = Db::getInstance()->findAll(Post::$table);

        return $this->twig->render('index.html.twig', compact('posts'));
    }

    /**
     * Save new post
     *
     * @param $params
     * @return mixed
     */
    public function save($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');

        return Db::getInstance()->save($params);
    }
}