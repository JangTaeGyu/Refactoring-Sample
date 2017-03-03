<?php

use App\Libraries\Loader;
use App\Models\User;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

$users = User::all();

$user = User::find($index);

$index = User::insert([
    'name' => '장태규',
    'email' => 'ttggbbgg1@gmail.com',
    'password' => password_hash('#cosmos01!', PASSWORD_DEFAULT, ['cost' => 12]),
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
]);


$result = User::update($index, [
    'name' => '장태규',
    'email' => "ttggbbgg2{$index}@gmail.com",
    'password' => password_hash('#cosmos01!', PASSWORD_DEFAULT, ['cost' => 12]),
    'updated_at' => date('Y-m-d H:i:s')
]);

$user = User::delete($index);

echo view('main/index.php', ['database' => $database]);
