<?php

use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;

$routes->scope('/', function (RouteBuilder $builder) {

    $builder->connect('/home', ['controller' => 'Pages', 'action' => 'display', 'home'], ['_name' => 'home']);
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'index'], ['_name' => 'index']);
    $builder->connect('/pages/*', 'Pages::display');
    $builder->connect(
        '/users/login',
        ['controller' => 'Members', 'action' => 'login'],
        ['_name' => 'login']
    );
    $builder->connect(
        '/users/regis',
        ['controller' => 'Members', 'action' => 'register'],
        ['_name' => 'register']
    );
    $builder->connect(
        '/users/forward',
        ['controller' => 'Members', 'action' => 'forward'],
        ['_name' => 'forward']
    );
    $builder->connect('/users/reset-pass/{token}', ['controller' => 'Members', 'action' => 'resetPass'], ['_name' => 'reset-pass']);
    $builder->connect('/not-found', ['controller' => 'Pages', 'action' => 'error404'], ['_name' => 'error404']);
    $builder->connect(
        '/users/profile/{id}',
        ['controller' => 'Members', 'action' => 'profile'],
        ['_name' => 'member_profile']
    );
    $builder->connect(
        '/users/change-password/{id}',
        ['controller' => 'Members', 'action' => 'changePassword'],
        ['_name' => 'member_changePass']
    );
    $builder->connect(
        '/users/change-avatar/{id}',
        ['controller' => 'Members', 'action' => 'changeAvatar'],
        ['_name' => 'member_changeAvatar']
    );
    $builder->connect(
        '/users/logout',
        ['controller' => 'Members', 'action' => 'logout'],
        ['_name' => 'users_logout']
    );

    $builder->connect('/checkEmail', ["controller" => "Members", "action" => "checkEmail"], ["_name" => "checkEmail"]);
    $builder->connect('/search', ["controller" => "Details", "action" => "search"], ["_name" => "search_movie"]);
    $builder->connect('/ajaxListMovies', ["controller" => "Details", "action" => "ajaxListMovies"], ["_name" => "ajaxListMovies"]);
    //movies details
    $builder->connect('/{slug}/{id}', ["controller" => "Movies", "action" => "details"], ["_name" => "movies_details"]);
    $builder->connect('/movie/{slug}/tap-{episode}', ["controller" => "Movies", "action" => "watch"], ["_name" => "watch_movie"]);

    //comment
    $builder->connect('/comment/write', ["controller" => "Movies", "action" => "comments"], ["_name" => "comment_film"]);

    //categories detail
    $builder->connect('/category/{slug}', ["controller" => "Details", "action" => "category"], ["_name" => "category_details"]);

    //countries
    $builder->connect('/countries/{slug}', ["controller" => "Details", "action" => "countries"], ["_name" => "countries_details"]);

    //genres
    $builder->connect('/genres/{slug}', ["controller" => "Details", "action" => "genres"], ["_name" => "genres_details"]);
    $builder->fallbacks();
});
