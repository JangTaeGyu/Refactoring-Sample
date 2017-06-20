<?php

header('Content-Type: text/html; charset=UTF-8');

session_start();

define('APP_URL', 'http://localhost:8000');

define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../');
define('APPLICATION', BASE_PATH . 'application/');
define('TEMPLATE', BASE_PATH . 'templates/');

include_once BASE_PATH . 'vendor/autoload.php';

date_default_timezone_set('Asia/Seoul');

App\Models\Session::instance()->expiration();
