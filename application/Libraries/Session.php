<?php
namespace App\Libraries;

use App\Models\Session as TblSessions;

class Session
{
    public static function save($userId)
    {
        return TblSessions::insert([
            'session_id' => session_id(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'timestamp' => time() + (int) get_cfg_var('session.gc_maxlifetime'),
            'user_id' => $userId
        ]);
    }

    public static function checkout()
    {
        return TblSessions::delete(session_id());
    }

    public static function exists($name)
    {
        return array_key_exists($name, $_SESSION);
    }

    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return self::exists($name) ? $_SESSION[$name] : '';
    }

    public static function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $value = '')
    {
        if ($name === 'success') {
            self::delete('old');
        }

        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);

            return $session;
        } else {
            self::set($name, $value);
        }
    }

}
