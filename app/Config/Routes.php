<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

// Menu Login
$routes->get('/pengajuan_konsultasi', 'Konsultasi::pengajuan_konsultasi');
$routes->post('/pengajuan_konsultasi', 'Konsultasi::post_konsultasi');
$routes->get('/my_menu', 'Konsultasi::my_menu');
$routes->get('/my_detail', 'Konsultasi::my_detail');
$routes->get('/detail_konsultasi', 'Konsultasi::detail_konsultasi');
$routes->post('/feedback_konsultasi', 'Konsultasi::feedback_konsultasi');

$routes->get('/konfirmasi_pengajuan/(:segment)/(:segment)', 'Konsultasi::konfirmasi_pengajuan/$1/$2');
$routes->get('/batalkan_pengajuan/(:segment)', 'Konsultasi::batalkan_pengajuan/$1');

$routes->group('/admin', static function ($routes) {
    // admin index
    $routes->get('index', 'Admin::index');

    // manajemen user
    $routes->get('user_list', 'Admin::user_list');
    $routes->get('user_role', 'Admin::user_role');
    // manajemen user menu
    $routes->get('change_status_user/(:segment)', 'Admin::user_status/$1');
    $routes->get('delete_user/(:segment)', 'Admin::user_delete/$1');
    $routes->post('user_change_role', 'Admin::user_change_role');

    // manajemen konsultasi
    $routes->get('konsultasi_list', 'Admin::konsultasi_list');
    $routes->get('konsultasi_detail', 'Admin::konsultasi_detail');
    $routes->post('konsultasi_detail', 'Admin::konsultasi_detail');
    $routes->get('konsultasi_confirm', 'Admin::konsultasi_list');
    $routes->post('konsultasi_jadwal', 'Admin::konsultasi_jadwal');
    $routes->post('konsultasi_link', 'Admin::konsultasi_link');
    $routes->post('konsultasi_bukti', 'Admin::konsultasi_bukti');
    $routes->get('konsultasi_delete', 'Admin::konsultasi_delete');
});

$routes->get('/wa', 'Home::wa');
$routes->get('/answer', 'Home::answer');
$routes->get('/webhook', 'Home::webhook');

service('auth')->routes($routes);
