<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('first_name');
        $this->setDisplayField('last_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            // You can configure as many upload fields as possible,
            // where the pattern is `field` => `config`
            //
            // Keep in mind that while this plugin does not have any limits in terms of
            // number of files uploaded per request, you should keep this down in order
            // to decrease the ability of your users to block other requests.
            'image' => [
                'fields' => [
                    'dir' => 'photo_dir',
                    'size' => 'photo_size',
                    'type' => 'photo_type',
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return strtolower(date("Y_m_d_H_i") . $data->getClientFilename());
                },
                'transformer' => function ($table, $entity, $data, $field, $settings, $filename) {
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(50, 50);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data->getStream()->getMetadata('uri'))
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data->getStream()->getMetadata('uri') => $filename,
                        $tmp => 'thumbnail-' . $filename,
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field},
                    ];
                },
                'keepFilesOnDelete' => false,
            ]
        ]);
        $this->addBehavior('Timestamp');
    }

    public function beforeSave($options = array())
    {
        if( isset($this->data['User']['photo']) )
        {
            $exp = array();
            $exp = explode("/", $this->data['User']['type']);
            $this->data['User']['photo'] = date("Y_m_d H_i") .".". $exp[1];
        }

        return true;
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

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), 'uniqueEmail', [
            'errorField' => 'email',
            'message' => 'There is already an user with that e-mail.',
        ]);

        return $rules;
    }
}
