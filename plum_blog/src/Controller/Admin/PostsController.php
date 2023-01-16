<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


class PostsController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function index(): void
    {
        $post = $this->Posts->find('all');

        if ($this->request->getQuery('find')) {
            $this->paginate['conditions']['title like'] = "%{$this->request->getQuery('find')}%";
        }

        $this->set('posts', $this->paginate($post));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $post = $this->Posts->newEmptyEntity();
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Post successfully saved!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->set([
                'post' => $post,
                'categories' => $this->Posts->Categories->find('list'),
            ]);
            $this->Flash->error(__('There was an error, please check the form'));
        }
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);

        if ($this->request->is(['post', 'put'])) {

            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Post successfully updated!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }

        $this->set([
            'post' => $post,
            'categories' => $this->Posts->Categories->find('list'),
        ]);
    }

    public function remove($id)
    {
        $this->request->allowMethod('post');

        $post = $this->Posts->get($id);

        if ($this->Posts->delete($post)) {
            $this->Flash->success('Post removed');
        } else {
            $this->Flash->error('It was not possible to remove the post');
        }

        return $this->redirect($this->referer());
    }
}
