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

        $this->set('movieCategory', $movieOfCategory);
    }

    public function getMoviesByCategory()
    {
        $this->autoRender = false;
        if($this->request->is('get')){
            $cateTitle = $this->request->getQuery('categoryTitle');
            $cateId = $this->request->getQuery('idCate');
            $categoryMovie = $this->Categories->getMoviesByCategory($cateTitle,$cateId);
            
            // $output = '';
            // foreach($categoryMovie as $cate){
            //     $output .= '
            //         <div class="slide-it">
            //             <div class="movie-item">
            //                 <div class="mv-img">
            //                     <image src="img/default/mv-item1.jpg" width="185" height="284"/>                                
            //                 </div> 
            //                 <div class="hvr-inner">
            //                     <a href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
            //                 </div>
            //                 <div class="title-in">
            //                     <h6><a href="#">'.$cate->Movie['m_name'].'</a></h6>
            //                     <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
            //                 </div>
            //             </div>   
            //         </div>            
            //     ';
            // }

            // if(empty($output)){
            //     echo "Không có phim";
            //     die;
            // }
            // echo $output;

            $movies = [
                'Category' => []
            ];
            
            if(empty($categoryMovie)){
                
                $movies['Category'][] = ['notification'=>'Không có phim'];
                return $this->response->withType("application/json")->withStringBody(json_encode(compact('movies')));
                exit();
            }

            foreach($categoryMovie as $cate){
                $movies['Category'][] = [
                    'id' => $cate->id,
                    'title' => $cate->title,
                    'slug' => $cate->slug,
                    'movie_name' => $cate->Movie['m_name']
                ];
            }
            
            return $this->response->withType("application/json")->withStringBody(json_encode(compact('movies')));
        }
        return "";

        // echo "";
    }
}
