<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pengajuan_konsultasi', 'Konsultasi::pengajuan_konsultasi');
$routes->post('/pengajuan_konsultasi', 'Konsultasi::post_konsultasi');
$routes->get('/my_menu', 'Konsultasi::my_menu');
$routes->get('/konfirmasi_pengajuan/(:segment)/(:segment)', 'Konsultasi::konfirmasi_pengajuan/$1/$2');
$routes->get('/batalkan_pengajuan/(:segment)', 'Konsultasi::batalkan_pengajuan/$1');
$routes->get('/admin/index', 'Admin::index');
$routes->get('/admin/user_list', 'Admin::user_list');
$routes->get('/admin/user_role', 'Admin::user_role');
$routes->get('/admin/user_change_role/(:segment)', 'Admin::user_role');
$routes->get('/admin/user_delete/(:segment)', 'Admin::user_delete/$1');
$routes->get('/admin/konsultasi_list', 'Admin::konsultasi_list');
$routes->get('/admin/konsultasi_confirm', 'Admin::konsultasi_list');
$routes->get('/admin/konsultasi_add_link', 'Admin::konsultasi_list');
$routes->get('/admin/konsultasi_delete', 'Admin::konsultasi_delete');

$routes->get('/wa', 'Home::wa');

service('auth')->routes($routes);
