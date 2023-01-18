<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class PagesController extends AppController
{
    public function beforeRender(EventInterface $event)
    {
        if (in_array($this->request->getParam('action'), ['aboutUs'])) {
            $this->viewBuilder()->setLayout('full-page');
        }
    }

    public function aboutUs()
    {

    }
}
