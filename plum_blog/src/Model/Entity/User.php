<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


class User extends Entity
{
    public $_accessible = [
        '*' => true,
    ];

    public function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    public function _getFullName()
    {
        return $this->_properties['first_name'] . $this->_properties['last_name'];
    }
}
