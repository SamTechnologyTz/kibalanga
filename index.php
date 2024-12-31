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
$route->post('log_in', [userController::class, 'login']);
$route->post('registration', [userController::class, 'register']);
$route->get('logout', 'home');
