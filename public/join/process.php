<?php

use App\Libraries\Session;
use App\Models\User;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

$request = request('POST', [
    'name' => '', 'email' => '', 'password' => '', 'password_match' => ''
]);

try {
    $index = User::insert([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => password_hash($request['password'], PASSWORD_DEFAULT, ['cost' => 12]),
    ]);
    if ($index === 0) {
        throw new Exception('회원가입에 실패 하였습니다. 다시 시도해 주세요.');
    }

    Session::flash('success', '회원가입에 성공 하였습니다.');

} catch (\Exception $e) {

    Session::flash('error', $e->getMessage());

    redirect('/join/index.php');
}

redirect(APP_URL);
