<?php
namespace App\Models;

use App\Libraries\Loader;
use App\Models\Traits\CrudTrait as Crud;

class Model
{
    use Crud;

    protected $db = null;

    private $prefix = 'scope';

    public function __construct()
    {
        $database = Loader::configs('database');

        $this->db = connection($database['localhost']);
    }

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
