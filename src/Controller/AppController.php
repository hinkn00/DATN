<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'home'
            ],
        ]);

        $member_info = $this->_getMemberLogin();
        $this->set(compact('member_info'));

        $categories = $this->_getCategory();
        $this->set(compact('categories'));

        $genres = $this->_getGenre();
        $this->set(compact('genres'));
    }
    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function _getMemberLogin()
    {
        return !empty($this->Auth->user()) ? $this->Auth->user() : '';
    }

    public function isCheckLogin()
    {
        return !empty($this->Auth->user()) ? true : false;
    }

    public function _getCategory()
    {
        $this->loadModel('Categories');
        $data = $this->Categories->find('all', [
            'conditions' => [
                'Category.status' => 1
            ]
        ]);

        return $data;
    }

    public function _getGenre()
    {
        $this->loadModel('Genres');
        $data = $this->Genres->find('all', [
            'conditions' => [
                'Genre.status' => 1
            ]
        ]);

        return $data;
    }
}
