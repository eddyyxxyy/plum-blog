<?php

namespace App\View\Helper;

use Cake\View\Helper;


class SessionHelper extends Helper
{
    public function read($path)
    {
        return $this->request->getSession()->read($path);
    }

    public function auth($field)
    {
        return $this->request->getSession()->read("Auth.User.{$field}");
    }
}
