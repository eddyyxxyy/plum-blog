<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class UsersController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);

        if ($this->request->getParam('action') == 'login')
        {
            $this->viewBuilder()->setLayout('login');
        }
    }

    public function index(): void
    {
        $users = $this->Users->find('all');

        if ($this->request->getQuery('find')) {
            $this->paginate['conditions']['or']['first_name like'] = "%{$this->request->getQuery('find')}%";
            $this->paginate['conditions']['or']['last_name like'] = "%{$this->request->getQuery('find')}%";
        }

        $this->set('users', $this->paginate($users));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('User successfully registered!'));

                $this->set('user', $user);
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }
    }

    public function edit($id)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('User info successfully updated!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
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

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Incorrect username or password.'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['put', 'post'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile was updated!'));

                return $this->redirect($this->referer());
            }

            $this->Flash->error(__('Error! Your profile wasn\'t updated!'));
        }

        $this->set('user', $user);
    }

    public function password()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['put', 'post'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your password was updated!'));

                return $this->redirect($this->referer());
            }

            $this->Flash->error(__('Error! Your password wasn\'t updated!'));
        }

        $this->set('user', $user);
    }
}
