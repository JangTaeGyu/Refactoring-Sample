<?php

use App\Libraries\Session;
use App\Models\Session as Database;

if (! function_exists('sessionExists')) {
    function sessionExists($name = '')
    {
        return Session::exists($name);
    }
}

if (! function_exists('sessionPut')) {
    function sessionPut($name = '', $value = '')
    {
        return Session::put($name, $value);
    }
}

if (! function_exists('sessionGet')) {
    function sessionGet($name = '')
    {
        return Session::get($name);
    }
}

if (! function_exists('sessionDelete')) {
    function sessionDelete($name = '')
    {
        Session::delete($name);
    }
}

if (! function_exists('sessionFlash')) {
    function sessionFlash($name = '', $value = '')
    {
        return Session::flash($name, $value);
    }
}

if (! function_exists('isLogin')) {
    function isLogin()
    {
        $session = Database::search();
        if (is_object($session)) {
            return true;
        }

        return false;
    }
}

if (! function_exists('session')) {
    function session($key = '')
    {
        if (isLogin()) {

            if (! isset($GLOBALS['session'])) {
                $GLOBALS['session'] = Database::search();
            }

            if ($key !== '') {
                return $GLOBALS['session']->{$key};
            }

            return $GLOBALS['session'];
        }

        return false;
    }
}
