<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cadastro', 'UsuarioController::index');
$routes->get('/email', 'UsuarioController::enviarEmail');
$routes->get('/empregador', 'UsuarioController::empregadorIndex');
$routes->get('/estagiario', 'UsuarioController::estagiarioIndex');
$routes->post('/cadastro', 'UsuarioController::verificarUsuario');
$routes->post('/cadastro/estagiario', 'UsuarioController::cadastrarEstagiario');
$routes->post('/cadastro/empregador', 'UsuarioController::cadastrarEmpregador');
$routes->get('/cadastro/vaga', 'EmpregadorController::index');
$routes->post('/cadastro/vaga', 'EmpregadorController::cadastrarVaga');
$routes->post('/login', 'UsuarioController::fazerLogin');
$routes->get('/logout', 'UsuarioController::fazerLogout');
$routes->get('/lista/empregadores', 'EmpregadorController::getEmpregadores');
$routes->get('/lista/interesse/(:num)', 'EmpregadorController::cadastrarInteresse/$1');
$routes->get('/lista/desinteresse/(:num)', 'EmpregadorController::descadastrarInteresse/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
