<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


class CategoriesController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function index(): void
    {
        $categories = $this->Categories->find('all');

        if ($this->request->getQuery('find')) {
            $this->paginate['conditions']['name like'] = "%{$this->request->getQuery('find')}%";
        }

        $this->set('categories', $this->paginate($categories));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $category = $this->Categories->newEmptyEntity();
            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Category successfully registered!'));

                $this->set('category', $category);
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }
    }

    public function edit($id)
    {
        $category = $this->Categories->get($id);

        if ($this->request->is(['post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Category info successfully updated!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }

        $this->set('category', $category);
    }

    public function remove($id)
    {
        $this->request->allowMethod('post');

        $category = $this->Categories->get($id);

        if ($this->Categories->delete($category)) {
            $this->Flash->success('Category removed');
        } else {
            $this->Flash->error('It was not possible to remove the user');
        }

        return $this->redirect($this->referer());
    }
}
