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
        $this->loadModel('Comments');
        $comments = $this->Comments->find('all',[
            'conditions' => [
                'comments.movie_id = '=>$movie->id
            ]
        ]);
        $this->set([
            'movie'=>$movie,
            'movies' => $movies,
            'comments' => $comments
        ]);
    }

    public function watch()
    {
        $slug = $this->request->getParam('slug');
        $movie = $this->Movies->getMovieBySlug($slug);
        $genre_movies = $this->Movies->getAllMoviesRelatedByGenreID($movie->movies_info->genre_id);
        $category_movies = $this->Movies->getAllMoviesRelatedByCategoryID($movie->movies_info->category_id);
        $this->loadModel('Comments');
        $comments = $this->Comments->find('all',[
            'conditions' => [
                'comments.movie_id = '=>$movie->id
            ]
        ]);
        $this->set(compact('movie','genre_movies','category_movies','comments'));
    }

    public function comments()
    {
        $this->autoRender = false;
        $data = array();
        $this->loadModel('Comments');
        $comment = $this->Comments->newEmptyEntity();
        if($this->request->is(['ajax','post'])){
            $comment = $this->Comments->patchEntity($comment, [
                'user_id' => $this->request->getData('user_id'),
                'movie_id' => $this->request->getData('movie_id'),
                'content' => $this->request->getData('comment'),
                'creared' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ]);
            if($this->Comments->save($comment)){
                echo json_encode("Bình luận thành công!");
                exit();
            }
            else{
                echo json_encode("Opps!...");
                die;
            }
        }
        echo "";
        die;
    }
}
