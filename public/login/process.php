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
    'email' => '', 'password' => ''
]);

try {
    $validation = Validation::make($request, Loader::rules('loginProcess'))->validate();
    if (! $validation->result) {
      throw new \Exception($validation->messages[0]);
    }

    $user = User::emailSearch($request['email']);
    if (! is_object($user)) {
        throw new \Exception('일치하는 이메일이 없습니다.');
    }

    if (! password_verify($request['password'], $user->password)) {
        throw new \Exception('비밀번호가 일치하지 않습니다.');
    }

    Session::save($user->id);

    Session::flash('success', '로그인에 성공 하였습니다.');

} catch (\Exception $e) {

    Session::flash('error', $e->getMessage());

    redirect('/login/index.php');
}

redirect(APP_URL);
