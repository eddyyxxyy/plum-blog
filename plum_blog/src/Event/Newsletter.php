<?php

namespace App\Event;

use Cake\Event\EventListenerInterface;
use App\Mailer\NewsletterMailer;


class Newsletter implements EventListenerInterface
{
    public function implementedEvents(): array
    {
        return [
            'Model.beforeSave' => [
                'callable' => 'sendEmail',
                'priority' => 15,
            ],
        ];
    }

    public function sendEmail($event, $entity, $options)
    {
        $email = new NewsletterMailer();
        $email->send('welcome', [$entity]);
    }
}
