<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

class MoviesController extends AdminController
{
    public function setModel()
    {
        $this->loadModel('Countries');
        $this->loadModel('Genres');
        $this->loadModel('Categories');
        $this->loadModel('MoviesInfo');
    }

    public function _getCategoriesTitle($movies)
    {
        $this->setModel();
        $category_title = $this->Categories->listCategory();

        foreach($movies as $index => $m){
            $index = $m['movies_info']['category_id'];
            
            foreach($category_title as $index_cate => $cate){
                if($index == $index_cate){
                    $m['category_title'] = $cate;
                }
            }
        }
        return $movies;
    }

    public function _getGenreTitle($movies)
    {
        $genre_title = $this->Genres->listGenres();
        foreach($movies as $index => $m){
            $index = $m['movies_info']['genre_id'];
            
            foreach($genre_title as $index_genre => $gen){
                if($index == $index_genre){
                    $m['genre_title'] = $gen;
                }
            }
        }

        return $movies;
    }

    public function _getCountryTitle($movies)
    {
        $country_title = $this->Countries->listCountry();
        foreach($movies as $index => $m){
            $index = $m['movies_info']['country_id'];
            
            foreach($country_title as $index_count => $count){
                if($index == $index_count){
                    $m['country_title'] = $count;
                }
            }
        } 

        return $movies;
    }
    public function index()
    {
        $this->setModel();
        $movie = $this->Movies->find('all',[
            'contain' => ['MoviesInfo']
        ]);

        $movies = $this->paginateAll($movie);
        
        $this->_getCategoriesTitle($movies);
        $this->_getGenreTitle($movies);
        $this->_getCountryTitle($movies);
          
        
        $this->set(compact('movies'));
    }

    public function view($id = null)
    {
        $this->setModel();

        $search = $this->request->getQuery('query');
        $result = $this->Movies->search($search);

        $movies =  null;
        if($result){
            $movies = $this->paginateSearch($result);
        } else{
            $movies = '';
        }

        $this->_getCategoriesTitle($movies);
        $this->_getGenreTitle($movies);
        $this->_getCountryTitle($movies);

        $this->set(compact('movies'));
    }

    public function add()
    {
        $this->setModel();
        $listCountry = $this->Countries->listCountry();
        $this->set('listCountry', $listCountry);
        
        $listGenres = $this->Genres->listGenres();
        $this->set('listGenres', $listGenres);
        
        $listCategories = $this->Categories->listCategory();
        $this->set('listCategories', $listCategories);
        
        $movie = $this->Movies->newEmptyEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if($this->Movies->save($movie)){
                $this->Flash->success(__('success'));
                return $this->redirect(['_name'=>'admin_movies_add']);
            }else{
                $this->set('error','Thêm không thành công! Vui lòng thử lại');
            }
        }
        $this->set(compact('movie'));
    }

    public function edit($id = null)
    {
        $this->setModel();

        $slug = $this->request->getParam('slug');

        $listCountry = $this->Countries->listCountry();
        $this->set('listCountry', $listCountry);
        
        $listGenres = $this->Genres->listGenres();
        $this->set('listGenres', $listGenres);
        
        $listCategories = $this->Categories->listCategory();
        $this->set('listCategories', $listCategories);
        
        
        $movie = $this->Movies->getMovieBySlug($slug);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            $movie->modified = date("Y-m-d");
            $movie->movies_info->modified = date("Y-m-d");

            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('success'));
                return $this->redirect(['_name'=>'admin_movies_edit','slug'=>$movie->m_slug]);
            }else{
                $this->set('error','Cập nhật không thành công! Vui lòng thử lại');
            }
        }
        $this->set(compact('movie'));
    }

    public function delete()
    {
        $this->setModel();
        $id = $this->request->getParam('id');
        $this->request->allowMethod(['post','delete']);

        $movie = $this->Movies->get($id,[
            'contain' => 'MoviesInfo'
        ]);

        $movie_info = $this->MoviesInfo->find("all",[
            'conditions' => array(
                'MoviesInfo.movie_id' => $movie->movies_info->movie_id
            )
        ])->first();

        if($this->Movies->delete($movie) && $this->MoviesInfo->delete($movie_info)){
            $this->Flash->success(__('success'));
            return $this->redirect(['_name'=>'admin_movies_home']);
        }else{
            $this->set('error','Xóa không thành công! Vui lòng thử lại');
        }
    }

    
}
