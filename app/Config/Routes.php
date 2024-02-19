<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// routes group dashboad

// auth
$routes->get('/', 'admin\AuthController::index');
$routes->post('/auth', 'admin\AuthController::auth');
$routes->get('/logout', 'admin\AuthController::logout');

$routes->group('dashboard', ['filter' => 'authTeam'], function ($routes) {
    $routes->get('/', 'admin\DashboardController::index');
    $routes->get('project', 'admin\ProjectController::index');
    $routes->get('project/(:num)', 'admin\ProjectController::show/$1');
    $routes->post('project/(:num)', 'admin\ProjectController::addActivity/$1');
    $routes->post('project/add', 'admin\ProjectController::addProject');
    $routes->get('project/add', 'admin\ProjectController::add');
    $routes->post('project/task/(:num)', 'admin\ProjectController::addTask/$1');
    $routes->get('getTeams', 'admin\ProjectController::getTeams');
    $routes->post('project/task/mark-as-done', 'admin\ProjectController::markAsDone');
    $routes->post('project/task/start-task', 'admin\ProjectController::startTask');

    $routes->get('customer', 'admin\CustomerController::index');
    $routes->post('customer', 'admin\CustomerController::add');
    $routes->get('team', 'admin\TeamController::index');
    $routes->post('team', 'admin\TeamController::add');
});
