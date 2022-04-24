<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminController;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

class EpisodesController extends AdminController{
   
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    public function setModel()
    {
        $this->loadModel('Episodes');
        $this->loadModel('Movies');
    }

    public function index()
    {
        $this->setModel();
        $episodesList = $this->Episodes->find('all',[
            'order'=>['Episode.created DESC'],
            'contain'=>['Movies']
        ]);
        $episodes = $this->paginateAll($episodesList);
        $this->set('episodes', $episodes);
    }
    public function add()
    {
        $this->setModel();
        $movie_list = $this->Movies->listMovies();
        $this->set('movie_list',$movie_list);
        $episode = $this->Episodes->newEmptyEntity();
        if ($this->request->is('post')) {
            echo $this->request->getData('movie_id');
            die;
        }
        $this->set('episode', $episode);
    }
    public function delete()
    {
        $id = $this->request->getParam('id');
        $this->request->allowMethod(['post','delete']);

        $category = $this->Comments->get($id);

        if($this->Comments->delete($category)){
            $this->Flash->success(__('success'));
            return $this->redirect(['_name'=>'admin_comment_home']);
        }else{
            $this->set('error','Xóa không thành công! Vui lòng thử lại');
        }
    }

    public function search()
    {
        $search = trim($this->request->getQuery('query'));
        $result = $this->Comments->search($search);

        $comments =  null;
        if($result){
            $comments = $this->paginateSearch($result);
        } else{
            $comments = '';
        }
        $this->set('comments',$comments);
    }

    public function ajaxEpisode()
    {
        $this->setModel();
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $movie = $this->Movies->get($id,['contain'=>'MoviesInfo']);
        $countEpisode = $this->Episodes->getCountEpisodeOfMovie($id);
        $data = [];
        if ($this->request->is(['post','ajax'])) {
            $data['total_episode'] = $movie->movies_info->total_episode;
            if($countEpisode === 0){
                $data['episode_current'] = 1;
            }else{
                if($countEpisode >= $movie->movies_info->total_episode){
                    $data['episode_current'] = $movie->movies_info->total_episode;
                }else{
                    $data['episode_current'] = $countEpisode;
                }
            }
            return $this->response->withType("application/json")->withStringBody(json_encode(compact('data')));    
            die;
        }
        return $this->response->withType("application/json")->withStringBody(json_encode(''));
    }
}
