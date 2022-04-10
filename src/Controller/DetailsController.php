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

        $cate_movies = $this->Categories->getMoviesByCategory($category->title, $category->id);
        $count_cate_movies = count($cate_movies->toArray());

        $this->set(compact('category', 'cate_movies','count_cate_movies'));
    }
    public function countries()
    {
        $this->setModel();
        $country_slug = $this->request->getParam('slug');
        $country = $this->Countries->getSlugOfCountries($country_slug);
        $county_movies = $this->Countries->getMoviesByCountries($country->country_slug, $country->id);
        $count_movies = count($county_movies->toArray());
        $this->set(compact('country','county_movies','count_movies'));
    }
    public function genres()
    {
        $this->setModel();
        $genre_slug = $this->request->getParam('slug');
        $genre = $this->Genres->getSlugOfGenres($genre_slug);
        $genre_movies = $this->Genres->getMoviesByGenre($genre->slug, $genre->id);
        $count_gen_movies = count($genre_movies->toArray());
        $this->set(compact('genre','genre_movies','count_gen_movies'));
    }
}
