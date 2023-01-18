<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


class NewslettersController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function index(): void
    {
        $newsletters = $this->Newsletters->find('all');

        if ($this->request->getQuery('find')) {
            $this->paginate['conditions']['email like'] = "%{$this->request->getQuery('find')}%";
        }

        $this->set('newsletters', $this->paginate($newsletters));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->newEmptyEntity();
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());

            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('Newsletter successfully registered!'));

                $this->set('Newsletter', $newsletter);
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }
    }

    public function edit($id)
    {
        $newsletter = $this->Newsletters->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());

            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('Newsletter info successfully updated!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('There was an error, please check the form'));
        }

        $this->set(compact('newsletter'));
    }

    public function remove($id)
    {
        $this->request->allowMethod('post');

        $newsletter = $this->Newsletters->get($id);

        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success('Newsletter removed');
        } else {
            $this->Flash->error('It was not possible to remove the user');
        }

        return $this->redirect($this->referer());
    }
}
