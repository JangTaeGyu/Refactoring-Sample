<?php
namespace App\Libraries\Traits;

trait CallStaticTrait
{
    public static function __callStatic($method, $parameters)
    {
        $instance = new static;

        $callMethod = $instance->prefix . ucfirst($method);
        if (method_exists($instance, $callMethod)) {
            return call_user_func_array([$instance, $callMethod], $parameters);
        }

        return new \Exception("{$callMethod} 메서드가 확인되지 않습니다.");
    }
}
