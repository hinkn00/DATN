<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setAlias("Category");
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MoviesInfo', [
            'foreignKey' => 'category_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

    public function getSlugOfCategories($slug)
    {
        $options = [
            "field" => "*",
            "conditions" => [
                'Category.slug' => $slug
            ],
            "order" => [
                'Category.id DESC'
            ]
        ];

        $data = $this->find('all',$options)->first();

        return $data;
    }

    public function search($search)
    {
        $options = array(
            'field' => '*',
            'conditions' => array(
                'OR' => array(
                    array('Category.title LIKE' => '%'.$search.'%'),
                    array('Category.slug LIKE' => '%'.$search.'%'),
                )
            )
        );

        $data = $this->find('all',$options);
        return $data;
    }

    public function listCategory()
    {
        return $this->find('list',[
            'keyField' => 'id',
            'valueField' => 'title',
            'conditions' => [
                'status <> 0' 
            ],
            'recursive' => -1            
        ]);
    }
}
