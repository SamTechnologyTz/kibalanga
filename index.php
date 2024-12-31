<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/vendor/autoload.php';

require_once 'core/Router.php';

$route = new Router();


$route->get('about', 'about');
$route->get('login', 'users/signin');
$route->get('register', 'users/signup');
$route->get('add_job', 'Admin/add_job');
$route->get('admin', 'Admin/index');
$route->postrequest('', [userController::class, 'readone'], 'welcome');
$route->postrequest('home', [userController::class, 'readone'], 'welcome');
$route->post('application_list', [applicationController::class, 'readAll']);
$route->post('log_in', [userController::class, 'login']);
$route->post('user_register', [userController::class, 'register']);
$route->postrequest('dashboard', [userController::class, 'readone'], 'users/user_dash');
$route->getrequest('deleteuser', [userController::class, 'delete'], 'home');
$route->get('ochu', 'sam');
$route->get('logout', 'home');
