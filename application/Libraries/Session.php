<?php
namespace App\Libraries;

use App\Libraries\Traits\CallStaticTrait as CallStatic;
use App\Models\Session as Database;

class Session
{
    use CallStatic;

    private $prefix = 'scope';

    public function __invoke()
    {
        session_destroy();

        session_set_save_handler(
            [$this, '_open'],
            [$this, '_close'],
            [$this, '_read'],
            [$this, '_write'],
            [$this, '_destroy'],
            [$this, '_gc']
        );

        session_start();
    }

    public function _open($path, $name)
    {
        echo '_open : ' . $path . ' | ' . $name . '<br />';

        return true;
    }

    public function _close()
    {
        return true;
    }

    public function _read($id)
    {
        $session = Database::find($id);
        if (is_object($session)) {
            return $session;
        }

        return '';
    }

    public function _write($id, $data)
    {
        $request = request('ALL');

        return Database::insert([
            'session_id' => $id,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'timestamp' => time() + (int) get_cfg_var('session.gc_maxlifetime'),
            'email' => $request['email']
        ]);
    }

    public function _destroy($id)
    {
        return Database::delete($id);
    }

    public function _gc($maxlifetime)
    {
        return Database::expiration();
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
