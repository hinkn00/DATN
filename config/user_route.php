<?php
    use Cake\Routing\Router;
    use Cake\Routing\RouteBuilder;

    $routes->scope('/', function (RouteBuilder $builder) {
 
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/pages/*', 'Pages::display');
        $builder->connect(
            '/login',
            ['controller'=>'Pages', 'action'=>'login'],
            ['_name'=>'login']
        );

        $builder->fallbacks();
    });
