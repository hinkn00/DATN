<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;
use Cake\Mailer\Mailer;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\TransportFactory;
//Creating API Keys for Basic Authentication
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Event\EventInterface;

class UsersController extends AdminController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

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
        $param_limit = $this->request->getParam('limit');
        $this->loadModel('Users');
        $users = $this->paginate($this->Users->find('all'),array('limit'=> isset($param_limit)? $param_limit : '10'));
        $this->set('users',$users);
        $this->set('title','Quản lý users');
    }
    public function add()
    {
        $this->loadModel('Users');
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post')){
            // $userTable = TableRegistry::get('Users');
            $user->name = $this->request->getData('name');
            $user->email = $this->request->getData('email');
            $user->password = md5($this->request->getData('password'));
            $user->role = $this->request->getData('role');
            $user->create_at = date('Y-m-d H:i:s');
            if($this->Users->save($user)){
                echo 'thanh cong';
            }else{
                echo 'fail';
            }
        }
        $this->set('user',$user);
        $this->set('title','Thêm người dùng');
    }
}
