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

$routes->get('admin/dashboard', '\App\Controllers\Admin\Dashboard::index');

$routes->group('admin', function ($routes) {
    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/(:num)', 'Admin\Categories::index/$1');
    $routes->post('categories', 'Admin\Categories::store');
    $routes->put('categories/(:num)', 'Admin\Categories::update/$1');
    $routes->delete('categories/(:num)', 'Admin\Categories::destroy/$1');
});
