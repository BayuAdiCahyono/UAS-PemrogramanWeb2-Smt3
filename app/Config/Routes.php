<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Home::index');
$routes->add('home/login', 'Home::login');
$routes->add('home/logout', 'Home::logout');
$routes->add('dashboard', 'Dashboard::index');
$routes->add('masjid', 'Masjid::index');
$routes->add('masjid/data_masjid_json', 'Masjid::data_masjid_json');
$routes->add('masjid/add', 'Masjid::add');
$routes->add('masjid/edit/(:num)', 'Masjid::edit/$1');
$routes->add('masjid/delete/(:num)', 'Masjid::delete/$1');
$routes->add('masjid/pro_add', 'Masjid::pro_add');
$routes->add('masjid/pro_edit', 'Masjid::pro_edit');

$routes->add('grafik_kategori', 'Grafik_kategori::index');
$routes->add('grafik_kategori/grafik_kategori_json', 'Grafik_kategori::grafik_kategori_json');

$routes->add('grafik_tipologi', 'Grafik_tipologi::index');
$routes->add('grafik_tipologi/grafik_tipologi_json', 'Grafik_tipologi::grafik_tipologi_json');

$routes->add('grafik_provinsi', 'Grafik_provinsi::index');
$routes->add('grafik_provinsi/grafik_provinsi_json', 'Grafik_provinsi::grafik_provinsi_json');

$routes->add('grafik_tglresmi', 'Grafik_tglresmi::index');
$routes->add('grafik_tglresmi/grafik_tanggalresmi_json', 'Grafik_tglresmi::grafik_tanggalresmi_json');

$routes->add('grafik_tgldata', 'Grafik_tgldata::index');
$routes->add('grafik_tgldata/grafik_tanggaldata_json', 'Grafik_tgldata::grafik_tanggaldata_json');
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