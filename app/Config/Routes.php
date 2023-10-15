<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pengajuan_konsultasi', 'Konsultasi::pengajuan_konsultasi');
$routes->post('/pengajuan_konsultasi', 'Konsultasi::post_konsultasi');
$routes->get('/my_menu', 'Konsultasi::my_menu');
$routes->get('/konfirmasi_admin/(:segment)/(:segment)', 'Konsultasi::konfirmasi_pengajuan/$1/$2');
$routes->get('/wa', 'Home::wa');

service('auth')->routes($routes);
