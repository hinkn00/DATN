<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'email_verified' => true,
        'password' => true,
        'remember_token' => true,
        'is_admin' => true,
        'role' => true,
        'active' => true,
        'status' => true,
        'create_at' => true,
        'modified' => true,
        'img_avatar' => true,
    ];
    
    protected $_hidden = [
        'password',
    ];
}
