<?php

namespace App\Mailer\Preview;

use DebugKit\Mailer\MailPreview;


class NewsletterPreview extends MailPreview
{
    public function welcome()
    {
        $this->loadModel('Newsletters');
        $user = $this->Newsletters->find('all')->first();

        return $this->getMailer('Newsletter')
            ->welcome($user);
    }
}
