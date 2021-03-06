<?php
use App\Libraries\Session;

if (! function_exists('request')) {
    function request($method = 'GET', array $data = [])
    {
        switch ($method) {
            case 'GET':
                $input = array_merge($_GET);
                break;
            case 'POST':
                $input = array_merge($_POST);
                break;
            default:
                $input = array_merge($_GET, $_POST);
                break;
        }

        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $request[$key] = array_key_exists($key, $input) && $input[$key] !== '' ? $input[$key] : $value;
            }
        } else {
            $request = $input;
        }

        // Request Session 저장하기
        Session::put('old', $request);

        // Request Post 접근할때 무조건 토큰 추가
        if (! array_key_exists('_token', $request)) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $request = array_merge($request, ['_token' => $input['_token']]);
            }
        }

        return $request;
    }
}

if (! function_exists('old')) {
    function old($name = '')
    {
        if (Session::exists('old')) {
            $session = Session::get('old');
            if (array_key_exists($name, $session)) {
                return $session[$name];
            }
        }

        return '';
    }
}
