<?php
namespace App\Models;

class Session extends Model
{
    protected $schema = 'development';

    protected $table = 'sessions';

    protected $key = 'session_id';

    public function scopeSearch()
    {
        $stmt = $this->db->prepare('SELECT user.* FROM development.sessions AS session INNER JOIN users AS user ON user.id = session.user_id WHERE session.session_id = :session_id');
        $stmt->execute(['session_id' => session_id()]);

        return $stmt->fetch($this->fetchMode);
    }

    public function scopeExpiration()
    {
        return $this->db
            ->prepare('DELETE FROM development.sessions WHERE timestamp < :time')
            ->execute(['time' => time()]);
    }
}
