<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/signup', 'AuthController::signup');
$routes->post('/signup', 'AuthController::doSignup');
$routes->get('/logout', 'AuthController::logout');

// Public User Route
$routes->get('/shoes', [\App\Controllers\ShoesController::class, 'index']);
$routes->get('/buy/(:num)', [\App\Controllers\ShoesController::class, 'buy']);

// Public API routes — accessible via Postman or frontend JS
$routes->group('api', function ($routes) {
    $routes->get('products', 'ProductController::apiIndex');
    $routes->post('products', 'ProductController::apiCreate');
    $routes->put('products/(:num)', 'ProductController::apiUpdate/$1');
    $routes->delete('products/(:num)', 'ProductController::apiDelete/$1');
});

// 🔐 Protected routes (require auth)
$routes->group('', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/profile', 'ProfileController::index');

    $routes->group('', ['filter' => 'role:admin'], function ($routes) {
        $routes->get('/products', 'ProductController::index');
        $routes->get('/products/add', 'ProductController::add');
        $routes->post('/products/create', 'ProductController::create');
        $routes->get('/products/edit/(:num)', 'ProductController::edit/$1');
        $routes->post('/products/update/(:num)', 'ProductController::update/$1');
        $routes->get('/products/delete/(:num)', 'ProductController::delete/$1');
    });
});

// Test Route
$routes->get('/test', function () {
    return 'Test Route is working!';
});
