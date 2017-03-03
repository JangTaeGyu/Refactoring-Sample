<?php

use App\Libraries\Csrf;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

$token = token();

$result = Csrf::check($token);

echo $token . '<br />';

var_dump($result);

echo view('main/index.php');
