<?php
namespace App\Controller;

use App\Controller\AppController;

class MembersController extends AppController{
    public function index()
    {
        $this->set('title','Hồ sơ cá nhân');
    }
    public function profile()
    {
        $this->set('title','Hồ sơ cá nhân');
    }
}