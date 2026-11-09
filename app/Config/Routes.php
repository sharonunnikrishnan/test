<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->group('employees', function($routes)
{
    $routes->get('/', 'EmployeeController::index');

    $routes->get('create', 'EmployeeController::create');
    $routes->post('store', 'EmployeeController::store'); 

    $routes->get('(:num)/edit', 'EmployeeController::edit/$1');
    $routes->post('(:num)/update', 'EmployeeController::update/$1');

    $routes->post('(:num)/delete', 'EmployeeController::delete/$1');
});