<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CountriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('countries');
        $this->setAlias('Country');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('country_name')
            ->maxLength('country_name', 255)
            ->requirePresence('country_name', 'create')
            ->notEmptyString('country_name');

        $validator
            ->scalar('country_slug')
            ->maxLength('country_slug', 255)
            ->requirePresence('country_slug', 'create')
            ->notEmptyString('country_slug');

        $validator
            ->scalar('country_description')
            ->requirePresence('country_description', 'create')
            ->notEmptyString('country_description');

        $validator
            ->boolean('country_status')
            ->requirePresence('country_status', 'create')
            ->notEmptyString('country_status');

        return $validator;
    }
    public function getSlugOfCategories($slug)
    {
        $options = [
            "field" => "*",
            "conditions" => [
                'Country.country_slug' => $slug
            ],
            "order" => [
                'Country.id DESC'
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
                    array('Country.country_name LIKE' => '%'.$search.'%'),
                    array('Country.country_slug LIKE' => '%'.$search.'%'),
                )
            )
        );

        $data = $this->find('all',$options);
        return $data;
    }
}
