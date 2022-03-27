<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\EventInterface;


class PagesController extends AppController
{
    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        $home_page = true;
        $this->set('home_page', $home_page);
    }
    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);
    }

    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index()
    {
        $movieOfCategory = 'Phim theo danh mục';
        $category= $this->Categories->find('all');
        // echo "<pre>";
        // echo json_encode($category);
        // echo "</pre>";die;
        $this->set('movieCategory', $movieOfCategory);
    }

    public function getMoviesByCategory()
    {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $cateTitle = $this->request->getQuery('categoryTitle');
            $cateId = $this->request->getQuery('idCate');
            $categoryMovie = $this->Categories->getMoviesByCategory($cateTitle,$cateId);
            $movies = [
                'category' => []
            ];
            
            foreach($categoryMovie as $cate){
                $movies['category'][] = [
                    'title' => $cate->title,
                ];
            }
            return $this->response->withType("application/json")->withStringBody(json_encode(compact('categoryMovie')));
        }
        return "";
    }
}
