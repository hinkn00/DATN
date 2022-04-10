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
        $this->set([
            'movie'=>$movie,
        ]);
    }
}
