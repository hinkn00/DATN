<?php
    use Cake\Routing\Router;
    use Cake\Routing\RouteBuilder;

    $routes->scope('/', function (RouteBuilder $builder) {
 
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/pages/*', 'Pages::display');
        $builder->connect(
            '/login',
            ['controller'=>'Members', 'action'=>'login'],
            ['_name'=>'login']
        );
        $builder->connect(
            '/users/profile',
            ['controller'=>'Members','action'=>'profile'],
            ['_name'=>'users_profile']
        );

        $builder->fallbacks();
    });
