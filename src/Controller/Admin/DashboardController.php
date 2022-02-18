<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        $this->set('title','Điều khiển');
    }
}