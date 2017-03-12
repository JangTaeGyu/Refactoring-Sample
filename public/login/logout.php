<?php

use App\Libraries\Session as Database;

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

if (isLogin()) {

    Database::checkout();

    redirect(APP_URL);
}

echo view('error/alertAfterTarget.php', ['message' => '로그인 정보가 없습니다.', 'target' => APP_URL]);
