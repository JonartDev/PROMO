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

// home page (if app has frontend)
//$routes->get('/', 'Home::index');
//$routes->get('home' , 'Home::index');

// home page (if app has no frontend)
//$routes->get('/', 'Login::index');
//$routes->get('home' , 'Login::index');

// registration
//$routes->get('registration', 'Registration::index');
//$routes->post('registration', 'Registration::index');
//main
$routes->get('/', 'Home::index');
$routes->get('wap', 'Home::mobile');
// login
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::index');
$routes->get('logout', 'Login::logout');
$routes->get('logstatus', 'Login::logstatus');

/**
 * Filter authguard only restricts access via login.
 * filter permguard restricts access via login and permission
 */

// dashboard
$routes->get('dashboard', 'Admin\Dashboard::index', ['filter' => 'authGuard']);

// my profile
$routes->get('myprofile', 'Admin\MyProfile::index', ['filter' => 'authGuard']);
$routes->post('myprofile/save_data', 'Admin\MyProfile::save_data', ['filter' => 'authGuard']);

// user management
$routes->get('usermanagement', 'Admin\UserManagement::index', ['filter' => 'permGuard']);
$routes->post('usermanagement/datatable', 'Admin\UserManagement::datatable', ['filter' => 'authGuard']);
$routes->get('usermanagement/getGAuth','Admin\UserManagement::getGAuth', ['filter' => 'authGuard']);
$routes->post('usermanagement/getGAuthImg','Admin\UserManagement::getGAuthImg', ['filter' => 'authGuard']);
$routes->post('usermanagement/save_data', 'Admin\UserManagement::save_data', ['filter' => 'permGuard']);
$routes->post('usermanagement/delete_data', 'Admin\UserManagement::delete_data', ['filter' => 'permGuard']);

// permission management
$routes->get('permissionmanagement', 'Admin\PermissionManagement::index', ['filter' => 'permGuard']);
$routes->post('permissionmanagement/datatable', 'Admin\PermissionManagement::datatable', ['filter' => 'authGuard']);
$routes->post('permissionmanagement/save_data', 'Admin\PermissionManagement::save_data', ['filter' => 'permGuard']);
$routes->post('permissionmanagement/delete_data', 'Admin\PermissionManagement::delete_data', ['filter' => 'permGuard']);

// role management
$routes->get('rolemanagement', 'Admin\RoleManagement::index', ['filter' => 'permGuard']);
$routes->post('rolemanagement/datatable', 'Admin\RoleManagement::datatable', ['filter' => 'authGuard']);
$routes->post('rolemanagement/save_data', 'Admin\RoleManagement::save_data', ['filter' => 'permGuard']);
$routes->post('rolemanagement/delete_data', 'Admin\RoleManagement::delete_data', ['filter' => 'permGuard']);

// sysconfig
$routes->get('sysconfig', 'Admin\SysConfig::index', ['filter' => 'permGuard']);
$routes->post('sysconfig/datatable', 'Admin\SysConfig::datatable', ['filter' => 'authGuard']);
$routes->post('sysconfig/save_data', 'Admin\SysConfig::save_data', ['filter' => 'permGuard']);
$routes->post('sysconfig/delete_data', 'Admin\SysConfig::delete_data', ['filter' => 'permGuard']);

//SYSTEM MODULES no.097vip
$routes->get('promo3', 'Promo\Promo3::index', ['filter' => 'permGuard'] );
$routes->post('promo3/datatable', 'Promo\Promo3::datatable', ['filter' => 'authGuard'] );
$routes->post('promo3/download_csv_check', 'Promo\Promo3::download_csv_check', ['filter' => 'authGuard'] );
$routes->get('promo3/download_csv', 'Promo\Promo3::download_csv', ['filter' => 'authGuard'] );
$routes->post('promo3/payout_status', 'Promo\Promo3::payout_status', ['filter' => 'authGuard'] );
//for testing
$routes->get('promo3/test', 'Promo\Promo3::test', ['filter' => 'authGuard'] );

$routes->get('promo3betlist', 'Promo\Promo3betlist::index', ['filter' => 'permGuard'] ); //--
$routes->post('promo3betlist/datatable', 'Promo\Promo3betlist::datatable', ['filter' => 'authGuard']);
$routes->post('promo3betlist/save_data_csv', 'Promo\Promo3betlist::save_data_csv', ['filter' => 'permGuard'] );
$routes->get('promo3betlist/delete_unprocessed', 'Promo\Promo3betlist::delete_unprocessed', ['filter' => 'permGuard'] );
$routes->get('promo3betlist/process_data', 'Promo\Promo3betlist::process_data', ['filter' => 'permGuard'] );

$routes->get('promo3userinfo', 'Promo\Promo3userinfo::index', ['filter' => 'permGuard'] );
$routes->post('promo3userinfo/datatable', 'Promo\Promo3userinfo::datatable', ['filter' => 'authGuard']);
$routes->get('promo3userinfo/download_csv', 'Promo\Promo3userinfo::download_csv', ['filter' => 'authGuard'] );


//SYSTEM MODULES no.8167vip_org
$routes->get('promo8167', 'Promo\Promo8167::index', ['filter' => 'authGuard'] );
$routes->post('promo8167/datatable', 'Promo\Promo8167::datatable', ['filter' => 'authGuard']);
$routes->post('promo8167/download_csv_check', 'Promo\Promo8167::download_csv_check', ['filter' => 'authGuard'] );
$routes->get('promo8167/download_csv', 'Promo\Promo8167::download_csv', ['filter' => 'authGuard'] );
$routes->post('promo8167/payout_status', 'Promo\Promo8167::payout_status', ['filter' => 'authGuard'] );


$routes->get('promo8167betlist', 'Promo\Promo8167betlist::index', ['filter' => 'authGuard'] ); //--
$routes->post('promo8167betlist/datatable', 'Promo\Promo8167betlist::datatable', ['filter' => 'authGuard']);
$routes->post('promo8167betlist/save_data_csv', 'Promo\Promo8167betlist::save_data_csv', ['filter' => 'authGuard'] );
$routes->get('promo8167betlist/delete_unprocessed', 'Promo\Promo8167betlist::delete_unprocessed', ['filter' => 'authGuard'] );
$routes->get('promo8167betlist/process_data', 'Promo\Promo8167betlist::process_data', ['filter' => 'authGuard'] );

$routes->get('promo8167userinfo', 'Promo\Promo8167userinfo::index', ['filter' => 'authGuard'] );
$routes->post('promo8167userinfo/datatable', 'Promo\Promo8167userinfo::datatable', ['filter' => 'authGuard']);
$routes->get('promo8167userinfo/download_csv', 'Promo\Promo8167userinfo::download_csv', ['filter' => 'authGuard'] );


// Public API
$routes->get('getsysconfig/(:alphanum)', 'PublicApi\GetSysConfig::index/$1');
$routes->post('promo3api/show_level', 'PublicApi\Promo3api::show_level');
$routes->post('promo8167api/show_level', 'PublicApi\Promo8167api::show_level');



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
