<?php

use App\Libraries\Loader;
use App\Libraries\Session;
use App\Libraries\Validation;
use App\Models\User;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

if (isLogin()) {

    echo view('error/alertAfterTarget.php', ['message' => '이미 로그인을 하셨습니다.', 'target' => APP_URL]);
    die;
}

$request = request('POST', [
    'name' => '', 'email' => '', 'password' => '', 'password_match' => ''
]);

try {
    $validation = Validation::make($request, Loader::rules('joinProcess'))->validate();
    if (! $validation->result) {
      throw new \Exception($validation->messages[0]);
    }

    $index = User::insert([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => password_hash($request['password'], PASSWORD_DEFAULT, ['cost' => 12]),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]);
    if ($index === 0) {
        throw new \Exception('회원가입에 실패 하였습니다. 다시 시도해 주세요.');
    }

    Session::flash('success', '회원가입에 성공 하였습니다.');

} catch (\Exception $e) {

    Session::flash('error', $e->getMessage());

    redirect('/join/index.php');
}

redirect(APP_URL);
