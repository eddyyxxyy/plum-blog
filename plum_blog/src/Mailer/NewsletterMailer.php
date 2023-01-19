<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;


class NewsletterMailer extends Mailer
{
    public function welcome($entity)
    {
        return $this
            ->setEmailFormat('html')
            ->setTo($entity->email)
            ->setFrom('edson.test.cake@gmail.com')
            ->setSubject('Welcome to our newsletter!')
            ->setViewVars([
                'entity' => $entity,
            ])
            ->viewBuilder()
                ->setTemplate('welcome');
    }
}
