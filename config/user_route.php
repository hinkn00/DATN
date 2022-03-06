<?php
    use Cake\Routing\Router;
    use Cake\Routing\RouteBuilder;

    $routes->scope('/', function (RouteBuilder $builder) {
 
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home'],['_name'=>'home']);

        $builder->connect('/pages/*', 'Pages::display');
        $builder->connect(
            '/users/login',
            ['controller'=>'Members', 'action'=>'login'],
            ['_name'=>'login']
        );
        $builder->connect(
            '/users/profile/{id}',
            ['controller'=>'Members','action'=>'profile'],
            ['_name'=>'member_profile']
        );
        $builder->connect(
            '/users/logout',
            ['controller'=>'Members','action'=>'logout'],
            ['_name'=>'users_logout']
        );

        $builder->fallbacks();
    });
