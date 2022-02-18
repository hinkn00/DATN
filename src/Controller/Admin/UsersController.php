<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

class UsersController extends AdminController
{
    public function login()
    {
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
}
