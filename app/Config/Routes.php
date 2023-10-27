<?php

use App\Controllers\Home;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/profile', 'Home::profile');
// $routes->get('/profile/(:any)/(:any)/(:any)', 'Home::profile/$1/$2/$3');
$routes->get('/user/profile', 'UserController::profile');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user', 'UserController::index');
$routes->get('/user/(:any)/edit', 'UserController::edit/$1');
$routes->put('/user/(:any)', 'UserController::update/$1');
$routes->get('/user/(:any)', 'UserController::show/$1');
$routes->delete('/user/(:any)', 'UserController::destroy/$1');

$routes->get('/kelas/create', 'KelasController::create');
$routes->post('/kelas/store', 'KelasController::store');
$routes->get('/kelas', 'KelasController::index');
$routes->get('/kelas/(:any)/edit', 'KelasController::edit/$1');
$routes->put('/kelas/(:any)', 'KelasController::update/$1');
$routes->get('/kelas/(:any)', 'KelasController::show/$1');
$routes->delete('/kelas/(:any)', 'KelasController::destroy/$1');