<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class MoviesController extends AppController
{
    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        // $check_loader = true;
        // $this->set('check_loader', $check_loader);
    }

    public function index()
    {
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }

    
    public function details()
    {
        $id = $this->request->getParam('id');
        $movie = $this->Movies->get($id,array(
            'contain' => 'MoviesInfo'
        ));
        $movies = $this->Movies->getAllMoviesRelatedByGenreID($movie->movies_info->genre_id);
        $this->set([
            'movie'=>$movie,
            'movies' => $movies
        ]);
    }

    public function watch()
    {
        $slug = $this->request->getParam('slug');
        $movie = $this->Movies->getMovieBySlug($slug);
        $genre_movies = $this->Movies->getAllMoviesRelatedByGenreID($movie->movies_info->genre_id);
        $category_movies = $this->Movies->getAllMoviesRelatedByCategoryID($movie->movies_info->category_id);
        $this->set(compact('movie','genre_movies','category_movies'));
    }
}
