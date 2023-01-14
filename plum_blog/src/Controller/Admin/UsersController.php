<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


class UsersController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function index(): void
    {
        $users = $this->Users->find('all');

        $this->set('users', $this->paginate($users));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                //$this->Flash->success('User successfully registered!');

                return $this->redirect(['action' => 'index']);
            }

            //$this->Flash->error('There was an error, please check the form');
        }

        // $this->set('user', $user);
    }

    public function edit($id)
    {
        $user = $this->Users->get($id);

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                // $this->Flash->success('User successfully registered!');

                return $this->redirect($this->referer());
            }

            // $this->Flash->error('There was an error, please check the form');
        }

        $this->set('user', $user);
    }

    public function remove($id)
    {
        $this->request->allowMethod('post');

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success('User removed');
        } else {
            $this->Flash->error('It was not possible to remove the user');
        }

        return $this->redirect($this->referer());
    }
}
