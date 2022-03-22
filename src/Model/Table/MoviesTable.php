<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MoviesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('movies');
        $this->setAlias('Movie');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('MoviesInfo', [
            'foreignKey' => 'movie_id',
            'table' => 'movies_info',
            'alias' => 'MoviesInfo'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('m_name')
            ->maxLength('m_name', 255)
            ->requirePresence('m_name', 'create')
            ->notEmptyString('m_name');

        $validator
            ->scalar('m_slug')
            ->maxLength('m_slug', 255)
            ->requirePresence('m_slug', 'create')
            ->notEmptyString('m_slug');

        $validator
            ->scalar('m_desc')
            ->requirePresence('m_desc', 'create')
            ->notEmptyString('m_desc');

        return $validator;
    }

    public function getMovieBySlug($slug)
    {
        $options = array(
            'field' => "*",
            "conditions" => array(
                'Movie.m_slug' => $slug
            ),
            "contain" => array(
                "MoviesInfo"
            )
        );

        $data = $this->find("all",$options)->first();

        return $data;
    }
}
