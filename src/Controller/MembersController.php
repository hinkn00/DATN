<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class MembersController extends AppController{
    public function index()
    {
        
    }
    public function login()
    {
        $this->loadModel('Users');
        if($this->request->is('post')){
            $check_user = $this->Users->checkEmailUsers($this->request->getData('email'));
            $haser = new DefaultPasswordHasher();
            if($haser->check($this->request->getData('password'),$check_user['password'])){
                $this->Auth->setUser($check_user);
                echo json_encode(['member'=>$check_user]);
            }else{
                echo '';
            }
            die;
        }
    }
    public function logout()
    {
        // session_destroy();
        return $this->redirect($this->Auth->logout());
    }
    public function profile($id = null)
    {       
        $id = $this->request->getParam('id');
        $this->loadModel('UsersBase');
        $member = $this->UsersBase->get($id);

        // if(!$this->isCheckLogin()){
        //     return $this->redirect(['controller'=>'Pages','action'=>'home']);
        // }

        if($this->request->is(['post','put'])){
            $member = $this->UsersBase->patchEntity($member, [
                'name' => $this->request->getData('name'),
            ]);

            if($this->UsersBase->save($member)){
                $this->Auth->setUser($member);
                return $this->redirect(['controller' => 'Members', 'action' => 'profile', 'id'=> $id]); exit();
            }
        }
    }
}