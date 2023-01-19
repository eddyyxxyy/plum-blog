<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Event\Newsletter;

class NewslettersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('newsletters');
        $this->setPrimaryKey('id');
        $this->setDisplayField('email');

        $this->addBehavior('Timestamp');

        $this->getEventManager()->on(new Newsletter());
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('email', 'create', 'This field must be filled in')
            ->notEmptyString('email', 'This field must be filled in')

            ->email('email', true, 'Your e-mail is invalid');

        return $validator;
    }
}
