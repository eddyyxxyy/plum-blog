<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Event\EventInterface;
use Cake\Utility\Text;
use Cake\ORM\Behavior;


class SlugBehavior extends Behavior
{
    protected $_defaultConfig = [
        'baseField' => 'name',
        'slugField' => 'slug',
    ];

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    public function beforeMarshal(EventInterface $event, ArrayObject $data, ArrayObject $options)
    {
        $config = $this->getConfig();

        if (isset($data[$config['baseField']])) {
            $data[$config['slugField']] = strtolower(Text::slug($data[$config['baseField']]));
        }
    }
}
