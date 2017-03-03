<?php

use App\Libraries\Loader;
use App\Models\Model;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

$database = Loader::configs('database');

echo view('main/index.php', ['database' => $database]);
