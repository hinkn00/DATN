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
        $this->loadModel("Countries");
        $this->loadModel("Genres");
    }
    public function category()
    {
        $this->setModel();
        $cate_slug = $this->request->getParam('slug');
        $category = $this->Categories->getSlugOfCategories($cate_slug);
        $this->set(compact('category'));
    }
    public function countries()
    {
        $this->setModel();
        $country_slug = $this->request->getParam('slug');
        $country = $this->Countries->getSlugOfCountries($country_slug);
        $this->set(compact('country'));
    }
    public function genres()
    {
        $this->setModel();
        $genre_slug = $this->request->getParam('slug');
        $genre = $this->Genres->getSlugOfGenres($genre_slug);
        $this->set(compact('genre'));
    }
}
