<?php

function token()
{
    return App\Libraries\Csrf::generate();
}
