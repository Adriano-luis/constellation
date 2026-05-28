<?php

class User extends Model
{
    use CustomSearch;

    protected string $table = 'users';

    protected array $searchable = array(
        'username',
        'email'
    );

    public function getAll(string $search = ''): array
    {
        $filter = $this->filtered($this->searchable, $search);

        $query = "SELECT id, username, email FROM ".$this->table;

        if (!empty($filter['where'])) {
            $query .= " ".$filter['where'];
        }

        $query .= " ORDER BY id DESC";

        $sql = $this->db->prepare($query);

        foreach ($filter['params'] as $param => $value) {
            $sql->bindValue($param, $value);
        }

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}