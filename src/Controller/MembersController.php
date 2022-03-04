<?php
namespace App\Controller;

use App\Controller\AppController;

class MembersController extends AppController{
    public function index()
    {
        $this->set('title','Hồ sơ cá nhân');
    }
    public function login()
    {
        $this->loadModel('Users');
        if($this->request->is('post')){
            $check_user = $this->Users->find('all',[
                'conditions' => array(
                    "email" => $this->request->getData('email'),
                    "password" => md5($this->request->getData('password')),
                )
            ])->first();
            if($check_user){
                echo 'co';
            }else{
                echo 'khong';
            }
            die;
        }
        $this->set('title', 'Đăng nhập');
    }

    public function profile()
    {
        $this->set('title','Hồ sơ cá nhân');
    }
}