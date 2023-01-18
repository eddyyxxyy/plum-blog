<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Newsletter extends Entity
{
    public $_accessible = [
        'id' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
    ];
}
