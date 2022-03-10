<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Http\Middleware\CsrfProtectionMiddleware;

return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);

    require_once('user_route.php');
    
    /*
    * Router Admin
    */
    $routes->prefix('admin', function (RouteBuilder $routes){
        // $routes->applyMiddleware('csrf');

        $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index'],['_name'=>'admin_dashboard']);
        $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/users', ['controller' => 'Users', 'action' => 'index'],['_name'=>'admin_user_index']);
        $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add'],['_name'=>'admin_user_add']);
        $routes->connect('/users/edit/{id}', ['controller' => 'Users', 'action' => 'edit'],['_name'=>'admin_user_edit']);
        $routes->connect('/users/delete/{id}', ['controller' => 'Users', 'action' => 'delete'],['_name'=>'admin_users_delete']);
        $routes->connect('/users/search', ['controller' => 'Users', 'action' => 'search'],['_name'=>'admin_users_search']);
        $routes->connect('/categories/create', ['controller' => 'Categories', 'action' => 'add'],['_name'=>'admin_categories_add']);
        $routes->connect('/categories/home', ['controller' => 'Categories', 'action' => 'index'],['_name'=>'admin_categories_index']);
        $routes->connect('/categories/{slug}/edit', ['controller' => 'Categories', 'action' => 'edit'],['_name'=>'admin_categories_edit']);
        $routes->connect('/categories/delete/{id}', ['controller' => 'Categories', 'action' => 'delete'],['_name'=>'admin_categories_delete']);
        $routes->connect('/categories/search', ['controller' => 'Categories', 'action' => 'search'],['_name'=>'admin_categories_search']);
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
