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

    /**
     * 이메일 충복 체크
     *
     * @param  string $email
     * @return integer
     */
    public function scopeEmailSearch($email = '')
    {
        $stmt = $this->db->prepare('SELECT * FROM development.users WHERE email = :email');
        $stmt->execute(['email' => $email]);

        return $stmt->fetch($this->fetchMode);
    }
}
