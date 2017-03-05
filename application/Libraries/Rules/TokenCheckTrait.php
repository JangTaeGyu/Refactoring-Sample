<?php
namespace App\Libraries\Rules;

use App\Libraries\Csrf;

trait TokenCheckTrait
{
    private function token_check($value)
    {
        return Csrf::check($value);
    }
}
