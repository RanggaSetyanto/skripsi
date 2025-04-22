<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');

// routes admin dashboard
$routes->get('dashboard','Admin\DashboardController::index');

// routes staf dashboard
$routes->get('dashboardstaf','User\DashboardController::index');

// routes data user
$routes->get('user','Admin\UserController::index');
$routes->post('user/simpan', 'Admin\UserController::simpan');
$routes->get('user/edit/(:num)', 'Admin\UserController::edit/$1');
$routes->post('user/perbarui/(:num)', 'Admin\UserController::perbarui/$1');
$routes->get('user/hapus/(:num)', 'Admin\UserController::hapus/$1');
$routes->get('user/profile', 'Admin\UserController::profile');
$routes->post('user/profile/updateProfil', 'Admin\UserController::updateProfile');

// routes login
$routes->get('Login', 'LoginController::index');
$routes->post('login/proses', 'LoginController::proses');
$routes->get('logout', 'LoginController::logout');

// routes data jamaah
$routes->group('jamaah', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'JamaahController::index');
    $routes->get('tambah', 'JamaahController::tambah');
    $routes->post('simpan', 'JamaahController::simpan');
    $routes->get('edit/(:num)', 'JamaahController::edit/$1');
    $routes->post('update/(:num)', 'JamaahController::update/$1');
    $routes->get('hapus/(:num)', 'JamaahController::hapus/$1');
});

// routes data jamaah staf
$routes->group('jamaahstaf', ['namespace' => 'App\Controllers\User'], function($routes) {
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
    $routes->get('cetak/(:num)', 'PendaftaranController::cetak/$1');
});

// routes pendaftaran staf
$routes->group('pendaftaranstaf', ['namespace' => 'App\Controllers\User'], function($routes) {
    $routes->get('/', 'PendaftaranController::index');
    $routes->get('tambah', 'PendaftaranController::create');
    $routes->post('simpan', 'PendaftaranController::simpan');
    $routes->get('edit/(:num)', 'PendaftaranController::edit/$1');
    $routes->post('update/(:num)', 'PendaftaranController::update/$1');
    $routes->get('delete/(:num)', 'PendaftaranController::delete/$1');
    $routes->get('cetak/(:num)', 'PendaftaranController::cetak/$1');
});

// routes pembayaran
$routes->group('pembayaran', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'PembayaranController::index');
    $routes->post('simpan', 'PembayaranController::simpan');
    $routes->get('getHarga/(:num)', 'PembayaranController::getHarga/$1');
    $routes->get('edit/(:num)', 'PembayaranController::edit/$1');
    $routes->post('update/(:num)', 'PembayaranController::update/$1');
    $routes->get('hapus/(:num)', 'PembayaranController::hapus/$1');
});

// routes pembayaran
$routes->group('pembayaranstaf', ['namespace' => 'App\Controllers\User'], function($routes) {
    $routes->get('/', 'PembayaranController::index');
    $routes->post('simpan', 'PembayaranController::simpan');
    $routes->get('getHarga/(:num)', 'PembayaranController::getHarga/$1');
    $routes->get('edit/(:num)', 'PembayaranController::edit/$1');
    $routes->post('update/(:num)', 'PembayaranController::update/$1');
    $routes->get('hapus/(:num)', 'PembayaranController::hapus/$1');
});

// routes paket umroh
$routes->get('paketumroh', 'Admin\PaketumrohController::index');
$routes->get('datapaket', 'Admin\DatapaketController::index');
$routes->get('datapaket/tambah', 'Admin\DatapaketController::tambah');
$routes->post('datapaket/simpan', 'Admin\DatapaketController::simpan');
$routes->get('datapaket/edit/(:num)', 'Admin\DatapaketController::ubah/$1');
$routes->post('datapaket/perbarui/(:num)', 'Admin\DatapaketController::perbarui/$1'); // Proses ubah data paket
$routes->get('datapaket/hapus/(:num)', 'Admin\DatapaketController::hapus/$1'); // Proses hapus data paket

// routes paket umroh staf
$routes->get('paketumrohstaf', 'User\PaketumrohController::index');
