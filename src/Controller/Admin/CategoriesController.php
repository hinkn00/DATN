<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

class CategoriesController extends AdminController{
   
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Categories');
    }

    public function index()
    {
        $categoryList = $this->Categories->find('all');
        $categories = $this->paginateAll($categoryList);
        $this->set('categories', $categories);
    }

    public function add()
    {
        $categories = $this->Categories->newEmptyEntity();
        if($this->request->is('post')){
            $categories = $this->Categories->patchEntity($categories, $this->request->getData());
            if($this->Categories->save($categories)){
                $this->Flash->success(__('success'));
                return $this->redirect(['_name'=>'admin_categories_add']);
            }else{
                $this->set('error','Thêm không thành công! Vui lòng thử lại');
            }
        }
        $this->set('category', $categories);
    }

    public function edit()
    {
        $slug = $this->request->getParam('slug');
        $category = $this->Categories->getSlugOfCategories($slug);
        if($this->request->is(['post','put'])){
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            $category->modified = date("Y-m-d");
            if($this->Categories->save($category)){
                $this->Flash->success(__('success'));
                return $this->redirect(['_name'=>'admin_categories_edit','slug'=>$category->slug]);
            }else{
                $this->set('error','Cập nhật không thành công! Vui lòng thử lại');
            }
        }
        $this->set('category',$category);
    }

    public function delete()
    {
        $id = $this->request->getParam('id');
        $this->request->allowMethod(['post','delete']);

        $category = $this->Categories->get($id);

        if($this->Categories->delete($category)){
            $this->Flash->success(__('success'));
            return $this->redirect(['_name'=>'admin_categories_index']);
        }else{
            $this->set('error','Xóa không thành công! Vui lòng thử lại');
        }
    }

    public function search()
    {
        $search = $this->request->getQuery('query');
        $result = $this->Categories->search($search);

        $categories =  null;
        if($result){
            $categories = $this->paginateSearch($result);
        } else{
            $categories = '';
        }
        $this->set('categories',$categories);
    }
}