<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// User

$routes->get('/', 'Seleksi::home');
$routes->group('/', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('beranda', 'Seleksi::beranda');
    $routes->get('pengumuman', 'Seleksi::pengumuman');
    $routes->get('awal', 'Seleksi::awal');
    $routes->get('akhirr', 'Seleksi::akhir');
    $routes->get('wawancara', 'Seleksi::wawancara');
    $routes->get('formberkas', 'Seleksi::formberkas');
    $routes->post('upload', 'Seleksi::submit');
    $routes->get('login', 'Seleksi::login');
    $routes->post('loginn', 'Seleksi::tombollogin');
    $routes->get('logout', 'Seleksi::logout');
    $routes->get('logoutadmin', 'Admin::logout');
    $routes->get('menunggu', 'Seleksi::tunggu');
    $routes->get('loginadmin', 'Admin::login');
    $routes->post('loginadminn', 'Admin::tombollogin');
});

// Admin
$routes->group('/backsite', ['namespace' => 'App\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('permission', 'Admin::permission');
    $routes->get('role', 'Admin::role');
    $routes->get('room', 'Admin::room');
    $routes->get('room-pewawancara', 'Admin::roompewawancara');
    $routes->get('add-room', 'Admin::addroom');
    $routes->post('addroom', 'Admin::submitaddroom');
    $routes->get('user', 'Admin::user');
    $routes->get('admawal', 'Admin::admawal');
    $routes->get('data-awal/(:num)', 'Admin::dataawal/$1');
    $routes->get('pewawancara/(:num)', 'Admin::pewawancara/$1');
    $routes->get('adm-akhir', 'Admin::admakhir');
    $routes->get('pengumuman-akhir', 'Admin::pengumumanakhir');
    $routes->get('data-diri', 'Admin::datadiri');
    $routes->get('isi-data-diri', 'Admin::isidatadiri');
    $routes->get('edit-user/(:num)', 'Admin::edituser/$1');
    $routes->get('edit-role/(:num)', 'Admin::editrole/$1');
    $routes->get('reset-password/(:num)', 'Admin::reset/$1');
    $routes->get('add-user', 'Admin::adduser');
    $routes->get('detail-wawancara/(:num)', 'Admin::detailwawancara/$1');
    $routes->get('data-akhir/(:num)', 'Admin::dataakhir/$1');
    $routes->post('register', 'Admin::register');
    $routes->post('edituser/(:num)', 'Admin::submitedituser/$1');
    $routes->post('reset/(:num)', 'Admin::resetpassword/$1');
    $routes->post('editdataawal/(:num)', 'Admin::submitdataawal/$1');
    $routes->post('edit-wawancara/(:num)', 'Admin::editwawancara/$1');
    $routes->post('edit-dataakhir/(:num)', 'Admin::submitdataakhir/$1');
    $routes->post('editrolepermission/(:num)', 'Admin::submiteditrole/$1');
    $routes->get('template', 'Admin::template');
    $routes->get('add-template', 'Admin::addtemplate');
    $routes->post('submitaddtemplate', 'Admin::submitaddtemplate');
    $routes->get('user/delete/(:num)', 'Admin::deleteuser/$1');
    $routes->get('room/delete/(:num)', 'Admin::deleteroom/$1');
    $routes->get('template/delete/(:num)', 'Admin::deletetemplate/$1');
    $routes->get('dataawal/delete/(:num)', 'Admin::deletedataawal/$1');
    $routes->get('dataakhir/delete/(:num)', 'Admin::deletedataakhir/$1');
});


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
