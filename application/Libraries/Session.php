<?php
namespace App\Libraries;

use App\Libraries\Traits\CallStaticTrait as CallStatic;
use App\Models\Session as Database;

class Session
{
    use CallStatic;

    private $prefix = 'scope';

    public function scopeSave($userId)
    {
        return Database::insert([
            'session_id' => session_id(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'timestamp' => time() + (int) get_cfg_var('session.gc_maxlifetime'),
            'user_id' => $userId
        ]);
    }

    public function scopeCheckout()
    {
        return Database::delete(session_id());
    }

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
        return $this->scopeExists($name) ? $_SESSION[$name] : '';
    }

    public function scopeDelete($name)
    {
        if ($this->scopeExists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public function scopeFlash($name, $value = '')
    {
        if ($name === 'success') {
            $this->scopeDelete('old');
        }

        if ($this->scopeExists($name)) {
            $session = $this->scopeGet($name);
            $this->scopeDelete($name);

            return $session;
        } else {
            $this->scopePut($name, $value);
        }
    }

}
