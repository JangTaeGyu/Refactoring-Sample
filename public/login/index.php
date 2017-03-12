<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/app.php';

if (isLogin()) {

    echo view('error/alertAfterTarget.php', ['message' => '이미 로그인을 하셨습니다.', 'target' => APP_URL]);
    die;
}

echo view('login/index.php');
