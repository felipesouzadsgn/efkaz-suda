<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Publica
$routes->get('/', 'Home::index');

// Admin
$routes->get('/admin', 'Admin\Admin::index', ['filter' => 'auth']);

// Simulador
$routes->get('/simulador', 'Simulador::step1');
$routes->get('/simulador/2', 'Simulador::step2');
$routes->get('/simulador/3', 'Simulador::step3');
$routes->get('/simulador/4', 'Simulador::step4');
$routes->get('/simulador/5', 'Simulador::step5');
$routes->get('/simulador/fim', 'Simulador::fim');
$routes->get('/simulador/obrigado', 'Simulador::obrigado');

// Cadastro
$routes->get('/cadastro', 'Cadastro::step1');
$routes->get('/cadastro/2', 'Cadastro::step2');
$routes->get('/cadastro/3', 'Cadastro::step3');
$routes->get('/cadastro/4', 'Cadastro::step4');

// Users
$routes->get('/users', 'User::index');
$routes->get('/entrar', 'User::login');
$routes->get('/sair', 'User::logout');
$routes->get('/user/adicionar', 'User::add');
$routes->post('/user/autorizar', 'User::autorizar');
$routes->post('/user/registrar', 'User::registrar');

//Ajax
$routes->post('/simulador/save', 'Simulador::saveStep');
$routes->get('/simulador/save', 'Simulador::saveStep');
