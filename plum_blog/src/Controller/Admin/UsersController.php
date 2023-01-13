<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


class UsersController extends AppController
{
    public function index()
    {

    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('User successfully registered!');

                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }

            $this->Flash->error('There was an error, please check the form');
        }

        $this->set('user', $user);
    }
}
