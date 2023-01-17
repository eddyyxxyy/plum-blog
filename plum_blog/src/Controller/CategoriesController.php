<?php

namespace App\Controller;

use App\Controller\AppController;


class CategoriesController extends AppController
{
    public $paginate = [
        'order' => ['Posts.modified' => 'desc'],
    ];

    public function view()
    {
        $this->set([
            'posts' => $this->paginate(
                $this->Categories->Posts->find('all')
                    ->contain(['Categories', 'Users'])
                    ->where(['Categories.slug' => $this->request->getParam('category')])
            )
        ]);
    }
}
