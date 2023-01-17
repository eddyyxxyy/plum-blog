<?php

namespace App\View\Cell;

use Cake\View\Cell;


class CategoriesCell extends Cell
{
    public function display()
    {
        $categories = $this->fetchTable('Categories')->find('all')
            ->order(['name']);

        $this->set('categories', $categories);
    }
}
