<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// routes admin dashboard
$routes->get('dashboard','Admin\dashboardController::index');

// routes data user
$routes->get('user','Admin\UserController::index');
$routes->post('user/simpan', 'Admin\UserController::simpan');
$routes->get('user/edit/(:num)', 'Admin\UserController::edit/$1');
$routes->post('user/perbarui/(:num)', 'Admin\UserController::perbarui/$1');
$routes->get('user/hapus/(:num)', 'Admin\UserController::hapus/$1');

// routes data jamaah
$routes->group('jamaah', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'JamaahController::index');
    $routes->get('tambah', 'JamaahController::tambah');
    $routes->post('simpan', 'JamaahController::simpan');
    $routes->get('edit/(:num)', 'JamaahController::edit/$1');
    $routes->post('update/(:num)', 'JamaahController::update/$1');
    $routes->get('hapus/(:num)', 'JamaahController::hapus/$1');
});

// routes pendaftaran
$routes->group('pendaftaran', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'PendaftaranController::index');
    $routes->get('tambah', 'PendaftaranController::create');
    $routes->post('simpan', 'PendaftaranController::simpan');
    $routes->get('edit/(:num)', 'PendaftaranController::edit/$1');
    $routes->post('update/(:num)', 'PendaftaranController::update/$1');
    $routes->get('delete/(:num)', 'PendaftaranController::delete/$1');
});

// routes paket umroh
$routes->get('paketumroh', 'Admin\PaketumrohController::index');
$routes->get('datapaket', 'Admin\DatapaketController::index');
$routes->get('datapaket/tambah', 'Admin\DatapaketController::tambah');
$routes->post('datapaket/simpan', 'Admin\DatapaketController::simpan');
$routes->get('datapaket/edit/(:num)', 'Admin\DatapaketController::ubah/$1');
$routes->post('datapaket/perbarui/(:num)', 'Admin\DatapaketController::perbarui/$1'); // Proses ubah data paket
$routes->get('datapaket/hapus/(:num)', 'Admin\DatapaketController::hapus/$1'); // Proses hapus data paket
