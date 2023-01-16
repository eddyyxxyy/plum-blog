<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class CategoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('Posts');

        $this->addBehavior('Slug');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('name', 'create', 'This field must be filled in')

            ->notEmptyString('name', 'This field must be filled in');

        return $validator;
    }
}
