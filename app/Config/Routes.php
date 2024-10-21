<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');

$routes->get('/buku', 'Buku::index');
$routes->get('/buku/edit/(:any)', 'Buku::edit/$1');
$routes->post('/buku/perbarui/(:num)', 'Buku::perbarui/$1');
$routes->get('/buku/tambah', 'Buku::tambah');
$routes->post('/buku/simpan', 'Buku::simpan');
$routes->delete('/buku/(:num)', 'Buku::hapus/$1');
$routes->get('/buku/(:any)', 'Buku::detail/$1');

$routes->get('/penulis', 'Penulis::index');
$routes->get('/penulis/$1', 'Penulis::show/$1');
$routes->get('/penulis/create', 'Penulis::create');
$routes->post('/penulis', 'Penulis::store');