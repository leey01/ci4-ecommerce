<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->add('forgot_password', 'Auth::forgot_password');
});

$routes->group('admin', ['filter' => 'admin-auth:admin,operator'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/(:num)', 'Admin\Categories::index/$1');
    $routes->post('categories', 'Admin\Categories::store');
    $routes->put('categories/(:num)', 'Admin\Categories::update/$1');
    $routes->delete('categories/(:num)', 'Admin\Categories::destroy/$1');

    $routes->get('attributes', 'Admin\Attributes::index');
    $routes->get('attributes/(:num)', 'Admin\Attributes::index/$1');
    $routes->post('attributes', 'Admin\Attributes::store');
    $routes->put('attributes/(:num)', 'Admin\Attributes::update/$1');
    $routes->delete('attributes/(:num)', 'Admin\Attributes::destroy/$1');
});
