<?php

namespace App\Controller;

use App\Controller\AppController;


class NewslettersController extends AppController
{
    public function add()
    {
        $this->request->allowMethod('post');

        $newsletter = $this->Newsletters->newEmptyEntity($this->request->getData());

        if ($this->Newsletters->save($newsletter)) {
            $this->Flash->success(__('You were subscribed to our newsletter!'));
        } else {
            $this->Flash->error(__('There was an error.'));
        }

        return $this->redirect($this->referer());
    }
}
