<?php
    use Cake\Routing\Router;
    use Cake\Routing\RouteBuilder;

    $routes->scope('/', function (RouteBuilder $builder) {
 
        $builder->connect('/home', ['controller' => 'Pages', 'action' => 'display', 'home'],['_name'=>'home']);
        $builder->connect('/',['controller'=>'Pages','action'=>'index'],['_name'=>'index']);
        $builder->connect('/movies/getMoviesByCategory',['controller'=>'Pages','action'=>'getMoviesByCategory'],['_name'=>'getMoviesByCategory']);
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
            '/users/change-password/{id}',
            ['controller'=>'Members','action'=>'changePassword'],
            ['_name'=>'member_changePass']
        );
        $builder->connect(
            '/users/change-avatar/{id}',
            ['controller'=>'Members','action'=>'changeAvatar'],
            ['_name'=>'member_changeAvatar']
        );
        $builder->connect(
            '/users/logout',
            ['controller'=>'Members','action'=>'logout'],
            ['_name'=>'users_logout']
        );

        $builder->fallbacks();
    });
