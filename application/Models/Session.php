<?php
namespace App\Models;

class Session extends Model
{
    protected $schema = 'development';

    protected $table = 'sessions';

    protected $key = 'session_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function scopeExpiration()
    {
        return $this->db
            ->prepare('DELETE FROM development.sessions WHERE timestamp < :time')
            ->execute(['time' => time()]);
    }
}
