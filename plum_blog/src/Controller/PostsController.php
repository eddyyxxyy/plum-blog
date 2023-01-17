<?php

namespace App\Controller;

use App\Controller\AppController;


class PostsController extends AppController
{
    public function index()
    {
        $this->set([
            'posts' => $this->Posts->find('all')
                ->contain(['Categories', 'Users'])
        ]);
    }

    public function view()
    {
        $post = $this->Posts->find('all')
            ->contain(['Categories', 'Users'])
            ->where(['Posts.slug' => $this->request->getParam('post')])
            ->first();
        $this->set(compact('post'));
    }
}
