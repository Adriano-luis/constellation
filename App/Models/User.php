<?php

namespace App\Models;

use App\Core\Model;
use App\Traits\CustomSearch;
use PDO;

class User extends Model {
    use CustomSearch;

    protected string $table = 'users';

    protected array $searchable = array(
        'username',
        'email'
    );

    public function getAll(string $search = '', int $offset = 0, int $limit = 10): array {
        $filter = $this->filtered($this->searchable, $search);

        $query = "SELECT id, username, email, created_at, updated_at FROM ".$this->table;

        if (!empty($filter['where'])) {
            $query .= " ".$filter['where'];
        }

        $query .= " ORDER BY id DESC";
        $query .= " LIMIT :offset, :limit";

        $sql = $this->db->prepare($query);

        foreach ($filter['params'] as $param => $value) {
            $sql->bindValue($param, $value);
        }

        $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sql->bindValue(':limit', $limit, PDO::PARAM_INT);

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal(string $search = ''): int {
        $filter = $this->filtered($this->searchable, $search);

        $query = "SELECT COUNT(*) as total FROM ".$this->table;

        if (!empty($filter['where'])) {
            $query .= " ".$filter['where'];
        }

        $sql = $this->db->prepare($query);

        foreach ($filter['params'] as $param => $value) {
            $sql->bindValue($param, $value);
        }

        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_ASSOC);

        return (int) $row['total'];
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