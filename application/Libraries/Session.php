<?php
namespace App\Libraries;

use App\Libraries\Traits\CallStaticTrait as CallStatic;

class Session
{
    use CallStatic;

    private $prefix = 'scope';

    public function scopeExists($name)
    {
        return array_key_exists($name, $_SESSION);
    }

    public function scopePut($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public function scopeGet($name)
    {
        return self::exists($name) ? $_SESSION[$name] : '';
    }

    public function scopeDelete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public function scopeFlash($name, $value = '')
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);

            return $session;
        } else {
            self::put($name, $value);
        }
    }

}
