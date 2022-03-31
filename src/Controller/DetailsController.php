<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class DetailsController extends AppController
{
    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
    }
    public function setModel()
    {
        $this->loadModel("Categories");
    }
    public function category()
    {
        $this->setModel();
        $cate_slug = $this->request->getParam('slug');
        $category = $this->Categories->getSlugOfCategories($cate_slug);
        $this->set(compact('category'));
    }
}
