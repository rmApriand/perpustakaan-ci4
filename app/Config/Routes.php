<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeUser::index');
$routes->get('/logo', 'Login::index');
$routes->get('home', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('buku', 'Buku::index');
$routes->get('kategori', 'Kategori::index');
$routes->get('stok', 'Stok::index');
$routes->get('peminjaman', 'Peminjaman::index');
$routes->get('home-user', 'HomeUser::index');
$routes->get('about', 'About::index');
$routes->get('user', 'User::list');
$routes->post('homeuser/search', 'HomeUser::search');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

$routes->get('tambah-buku', 'Buku::tambah');
$routes->post('tambah-buku', 'Buku::tambah');
$routes->get('tambah-kategori', 'Kategori::tambah');
$routes->post('tambah-kategori', 'Kategori::tambah');
$routes->get('tambah-stok', 'Stok::tambah');
$routes->post('tambah-stok', 'Stok::tambah');
$routes->get('tambah-peminjaman', 'Peminjaman::tambah');
$routes->post('tambah-peminjaman', 'Peminjaman::tambah');

//user
$routes->get('home-user', 'Buku::homeUser');
$routes->get('beranda', 'User::index');
$routes->get('peminjaman-user', 'PeminjamanUser::index');

$routes->get('edit-buku/(:any)', 'Buku::edit/$1');
$routes->post('edit-buku/(:any)', 'Buku::edit/$1');
$routes->get('delete-buku/(:any)', 'Buku::delete/$1');

$routes->get('edit-user/(:any)', 'User::edit/$1');
$routes->post('edit-user/(:any)', 'User::edit/$1');
$routes->get('delete-user/(:any)', 'User::delete/$1');

$routes->get('edit-kategori/(:num)', 'Kategori::edit/$1');
$routes->post('edit-kategori/(:num)', 'Kategori::edit/$1');
$routes->get('delete-kategori/(:num)', 'Kategori::delete/$1');

$routes->get('edit-stok/(:num)', 'Stok::edit/$1');
$routes->post('edit-stok/(:num)', 'Stok::edit/$1');
$routes->get('delete-stok/(:num)', 'Stok::delete/$1');

$routes->get('edit-peminjaman/(:num)', 'Peminjaman::edit/$1');
$routes->post('edit-peminjaman/(:num)', 'Peminjaman::edit/$1');
$routes->get('delete-peminjaman/(:num)', 'Peminjaman::delete/$1');