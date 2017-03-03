<?php
namespace App\Models\Traits;

trait CrudTrait
{
    private $fetchMode = \PDO::FETCH_OBJ;

    public function scopeAll()
    {
        return $this->db
            ->query("SELECT * FROM {$this->schema}.{$this->table} ORDER BY {$this->key} DESC")
            ->fetchAll($this->fetchMode);
    }

    public function scopeFind($index = 0)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->schema}.{$this->table} WHERE {$this->key} = :id");
        $stmt->execute(['id' => $index]);

        return $stmt->fetch($this->fetchMode);
    }

    public function scopeInsert(array $args = [])
    {
        $sql = sprintf("INSERT INTO {$this->schema}.{$this->table}(%s) VALUES (:%s)", implode(', ', array_keys($args)), implode(', :', array_keys($args)));

        $result = $this->db->prepare($sql)->execute($args);
        if ($result) {
            return (int) $this->db->lastInsertId();
        }

        return 0;
    }

    public function scopeUpdate($index = 0, array $args = [])
    {
        $values = [];

        foreach ($args as $column => $value) {
            array_push($values, sprintf('%s = :%s', $column, $column));
        }

        $sql = sprintf("UPDATE {$this->schema}.{$this->table} SET %s WHERE {$this->key} = :id", implode(', ', $values));

        return $this->db->prepare($sql)->execute(array_merge($args, ['id' => $index]));
    }

    public function scopeDelete($index = 0)
    {
        return $this->db
            ->prepare("DELETE FROM {$this->schema}.{$this->table} WHERE {$this->key} = :id")
            ->execute(['id' => $index]);
    }
}
