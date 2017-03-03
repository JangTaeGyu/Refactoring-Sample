<?php

use App\Libraries\Csrf;

if (! function_exists('token')) {
    function token()
    {
        return Csrf::generate();
    }
}
