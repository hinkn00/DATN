<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity
{
    protected $_accessible = [
        'title' => true,
        'slug' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'movies_info' => true
    ];
}
