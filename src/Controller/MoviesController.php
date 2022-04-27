<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class MoviesController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $check_loader = true;
        $this->set('check_loader', $check_loader);
    }

    public function index()
    {
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
    }


    public function details()
    {
        $id = $this->request->getParam('id');
        $movie = $this->Movies->get($id, array(
            'contain' => 'MoviesInfo'
        ));
        $movies = $this->Movies->getAllMoviesRelatedByGenreID($movie->movies_info->genre_id);
        $this->loadModel('Comments');
        $comments = $this->Comments->find('all', [
            'conditions' => [
                'comment.movie_id = ' => $movie->id
            ],
            'order' => [
                'comment.created DESC'
            ]
        ]);
        $agv_comments = $this->Comments->find('all', [
            'conditions' => [
                'comment.movie_id = ' => $movie->id
            ],
            'order' => [
                'comment.created DESC'
            ]
        ])->all()->avg('rate');
        $this->set([
            'movie' => $movie,
            'movies' => $movies,
            'comments' => $comments,
            'agv_comments' => $agv_comments
        ]);
    }

    public function watch()
    {
        $slug = $this->request->getParam('slug');
        $movie = $this->Movies->getMovieBySlug($slug);
        $this->loadModel('Episodes');
        $episode = $this->request->getParam('episode');
        $countEpisode = $this->Episodes->getCountEpisodeOfMovie($movie->id);
        $episode = $this->Episodes->getLinkEpisode($episode, $movie->id);
        $genre_movies = $this->Movies->getAllMoviesRelatedByGenreID($movie->movies_info->genre_id);
        $category_movies = $this->Movies->getAllMoviesRelatedByCategoryID($movie->movies_info->category_id);
        $this->loadModel('Comments');
        $comments = $this->Comments->find('all', [
            'conditions' => [
                'comment.movie_id = ' => $movie->id
            ],
            'contain' => ['Users', 'Movies']
        ]);
        $this->set(compact('movie', 'genre_movies', 'category_movies', 'comments', 'countEpisode', 'episode'));
    }

    public function comments()
    {
        $this->autoRender = false;
        $data = array();
        $this->loadModel('Comments');
        $comment = $this->Comments->newEmptyEntity();
        if ($this->request->is(['ajax', 'post'])) {
            $comment = $this->Comments->patchEntity($comment, [
                'user_id' => $this->request->getData('user_id'),
                'movie_id' => $this->request->getData('movie_id'),
                'content' => $this->request->getData('comment'),
                'rate' => $this->request->getData('rate_movie'),
                'creared' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ]);
            if ($this->Comments->save($comment)) {
                echo json_encode("Bình luận thành công!");
                exit();
            } else {
                echo json_encode("Opps!...");
                die;
            }
        }
        echo "";
        die;
    }
}
