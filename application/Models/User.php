<?php
namespace App\Models;

class User extends Model
{
    protected $schema = 'development';

    protected $table = 'users';

    protected $key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
