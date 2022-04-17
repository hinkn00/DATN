<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

class MembersController extends AppController{
    var $IS_ADMIN = 0;
    var $STATUS   = 0;
    var $ACTIVE   = 1;


    public function index()
    {
        
    }
    public function login()
    {
        $this->loadModel('Users');
        if($this->request->is('post')){
            $check_user = $this->Users->checkEmailUsers($this->request->getData('email'));
            $haser = new DefaultPasswordHasher();
            if($check_user){
                if($haser->check($this->request->getData('password'),$check_user['password'])){
                    $this->Auth->setUser($check_user);
                    echo "1";
                }else{
                    echo "0";
                }
            }else{
                echo "0";
            }
            die;
        }
    }
    public function logout()
    {
        // session_destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $this->autoRender = false;
        // debug($this->request->getData());die;
        $this->loadModel('UsersBase');
        $this->loadModel('Users');
        $user = $this->UsersBase->newEmptyEntity();
        if($this->request->is(['post'])){
            $haser = new DefaultPasswordHasher();
            $user->name = $this->request->getData('name');
            $user->email = $this->request->getData('email');
            $user->password = $haser->hash($this->request->getData('password'));
            $user->is_admin = 0;
            $user->role = 'member';
            $user->active = $this->ACTIVE;
            $user->create_at = date('Y-m-d H:i:s');            
            $user->img_avatar = 'default.jpg';
            if($this->Users->save($user)){
                $check_user = $this->Users->checkEmailUsers($this->request->getData('email'));
                if($haser->check($this->request->getData('password'),$check_user['password'])){
                    $this->Auth->setUser($check_user);
                    echo "<script>alert('Đăng ký thành công'); window.history.back();</script>";
                    exit();
                }
                // return $this->response->withType('application/json')
                // ->withStringBody(json_encode(['result' => 'success']));          
            }else{
                // return $this->response->withType('application/json')
                // ->withStringBody(json_encode(['result' => 'error']));
                echo "<script>alert('Đăng ký không thành công'); window.history.back()</script>";
                die;
            }
        }
        echo "";
        die;
    }

    public function profile($id = null)
    {       
        $id = $this->request->getParam('id');
        $this->loadModel('UsersBase');
        $member = $this->UsersBase->get($id,[
            'contain' => ['Profiles']
        ]);
        $this->set('member',$member);
        if(!$this->isCheckLogin()){
            return $this->redirect(['controller'=>'Pages','action'=>'index']);
        }

        if($this->request->is(['post','put'])){
            $member = $this->UsersBase->patchEntity($member, [
                'name' => $this->request->getData('name'),
            ]);
            $this->loadModel("Profiles");
            $profiles= $this->Profiles->getProfileOfUserId($id);
            $district = $this->request->getData('city');
            $city = $this->request->getData('country');
            $phone = $this->request->getData('number_phone');
            if(!$profiles){
                $profile = $this->UsersBase->newEmptyEntity();
                $profile->user_id = $id;
                $profile->phone = isset($phone)? $phone : '';
                $profile->address_city = isset($city) ? $city : '';
                $profile->address_district = isset($district) ? $district : '';
                $profile->created = date("Y-m-d H:m:s");
                $profile->modified = date("Y-m-d H:m:s");
                $this->Profiles->save($profile);
            }else{
                $profiles->phone = isset($phone)? $phone : $profiles->phone;
                $profiles->address_city = isset($city) ? $city : $profiles->address_city;
                $profiles->address_district = isset($district) ? $district : $profiles->address_district;
                $profiles->modified = date("Y-m-d H:m:s");
                $this->Profiles->save($profiles);
            }
            if($this->UsersBase->save($member)){
                $this->Auth->setUser($member);
                return $this->redirect(['_name'=>'member_profile', 'id'=> $id]);
            }
        }
    }

    public function changePassword($id = null)
    {
             
        $id = $this->request->getParam('id');
        $this->loadModel('UsersBase');
        $member = $this->UsersBase->get($id);

        if(!$this->isCheckLogin()){
            return $this->redirect(['controller'=>'Pages','action'=>'home']);
        }

        $haser = new DefaultPasswordHasher();
        $new_pass = $this->request->getData('new_password');
        $old_pass = $this->request->getData('old_password');

        if($this->request->is(['post','put'])){
            if($haser->check($old_pass, $member->password)){
                $member = $this->UsersBase->patchEntity($member, [
                    'password' => $haser->hash($new_pass),
                ]);
                if($this->UsersBase->save($member)){
                    $this->Auth->setUser($member);
                    return $this->redirect(['controller' => 'Members', 'action' => 'profile', 'id'=> $id]); exit();
                }
            }
        }
    }

    public function changeAvatar($id = null)
    {
             
        $id = $this->request->getParam('id');
        $this->loadModel('UsersBase');
        $member = $this->UsersBase->get($id);

        if(!$this->isCheckLogin()){
            return $this->redirect(['controller'=>'Pages','action'=>'home']);
        }

        if($this->request->is(['post','put'])){
            $img = $this->request->getData('img_change');
            if($img->getError() == 0){
                //check file upload
                if($member->img_avatar && $member->img_avatar != 'default.jpg'){
                    unlink(WWW_ROOT.'img/upload/users/'.$member->img_avatar);
                }
                $member->img_avatar = $this->uploadFile($img);
            }
            if($this->UsersBase->save($member)){
                $this->Auth->setUser($member);
                return $this->redirect(['controller' => 'Members', 'action' => 'profile', 'id'=> $id]); exit();
            }
        }
    }

    public function uploadFile($img)
    {
        $tmp = $img->getStream()->getMetadata('uri');
        $nameImg = $img->getClientFilename();
        $ex = substr(strrchr($nameImg,'.'),1);
        $newName = time().'_'.$nameImg;
        if(!file_exists(WWW_ROOT.'img/upload/users/')){
            mkdir(WWW_ROOT.'img/upload/users/', 0777, true);
        }
        $path = "img/upload/users/".$newName;
        move_uploaded_file($tmp, WWW_ROOT.$path);
        return $newName;
    }
}