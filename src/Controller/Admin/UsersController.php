<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

class UsersController extends AdminController
{
    public function login()
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->loadModel('Users');
        if($this->request->is('post')){
            $check_user = $this->Users->find('all',[
                'conditions' => array(
                    "email" => $this->request->getData('email'),
                    "password" => md5($this->request->getData('password')),
                    'is_admin' => 1,
                )
            ])->first();
            if($check_user){
                echo 'co';
            }else{
                echo 'khong';
            }
            die;
        }
        $this->set('title','Đăng nhập');
    }

    public function index()
    {
        $this->loadModel('Users');
        $users = $this->paginate($this->Users->find('all'),array('limit'=>'10'));
        $this->set('users',$users);
        $this->set('title','Quản lý users');
    }
}
