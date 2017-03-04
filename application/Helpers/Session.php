<?php

use App\Libraries\Session;

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
