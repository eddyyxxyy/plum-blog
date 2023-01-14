<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->addBehavior('Upload', [
            'field' => 'file',
            'folder' => 'upload/profile',
        ]);
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('first_name', 'create', 'This field must be filled in')
            ->requirePresence('last_name', 'create', 'This field must be filled in')
            ->requirePresence('email', 'create', 'This field must be filled in')
            ->requirePresence('password', 'create', 'This field must be filled in')

            ->notEmptyString('fist_name', 'This field must be filled in')
            ->notEmptyString('last_name', 'This field must be filled in')
            ->notEmptyString('email', 'This field must be filled in')
            ->notEmptyString('password', 'This field must be filled in')

            ->email('email', true, 'Your e-mail is invalid')
            ->minLength('password', 6, 'Passwords should be at least 6 characters long')

            ->allowEmptyFile('image');


        return $validator;
    }
}
