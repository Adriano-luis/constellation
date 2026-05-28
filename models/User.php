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

        $query = "SELECT id, username, email, created_at, updated_at FROM ".$this->table;

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

    public function emailExists(string $email) : bool {
        $sql = $this->db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->rowCount() > 0;
    }

    public function create(string $name, string $email, string $password): bool {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $sql->bindValue(':username', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);

        return $sql->execute();
    }
}