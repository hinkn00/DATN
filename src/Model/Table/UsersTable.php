<?php
namespace App\Model\Table;

use App\Model\Table\UsersBaseTable;
use Cake\ORM\Query;
class UsersTable extends UsersBaseTable{
    // hàm xử lý
    public function search($search)
    {
        // debug($search);die;
        $options = array(
            'field' => '*',
            'conditions' => array(
                'OR' => array(
                    array('User.name LIKE' => '%'.$search.'%'),
                    array('User.email LIKE' => '%'.$search.'%'),
                    array('User.role LIKE' => '%'.$search.'%')
                )
            )
        );

        $data = $this->find('all',$options);
        return $data;
    }
}