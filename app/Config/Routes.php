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

// routes pendaftaran
$routes->get('pendaftaran','Admin\PendaftaranController::index');

// routes paket umroh
$routes->get('paketumroh', 'Admin\PaketumrohController::index');

// routes menampilkan data paket umroh
$routes->get('datapaket', 'Admin\DatapaketController::index');

// routes tambah paket umroh
$routes->get('datapaket/tambah', 'Admin\DatapaketController::tambah');

// routes proses tambah paket umroh
$routes->post('datapaket/simpan', 'Admin\DatapaketController::simpan'); // Proses simpan data paket

// routes edit paket umroh
$routes->get('datapaket/edit/(:num)', 'Admin\DatapaketController::ubah/$1');

// routes proses edit paket umroh
$routes->post('datapaket/perbarui/(:num)', 'Admin\DatapaketController::perbarui/$1'); // Proses ubah data paket

// routes proses hapus paket umroh
$routes->get('datapaket/hapus/(:num)', 'Admin\DatapaketController::hapus/$1'); // Proses hapus data paket