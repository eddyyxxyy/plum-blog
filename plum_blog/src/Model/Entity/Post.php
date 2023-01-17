<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


class Post extends Entity
{
    public $_accessible = [
        '*' => true,
    ];
}
