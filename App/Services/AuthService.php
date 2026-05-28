<?php

namespace App\Services;

Use App\Core\Model;
use PDO;

class AuthService extends Model {

    public function isLogged() {
        return isset($_SESSION['authuser']) && !empty($_SESSION['authuser']);
    }

    public function requireLogin() {
        if (!$this->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }

    public function authenticate(string $email, string $password) {
        $sql = $this->db->prepare("SELECT id, password FROM users WHERE email = :email LIMIT 1 ");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            return false;
        }

        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        session_regenerate_id(true);

        $_SESSION['authuser'] = $user['id'];

        return true;
    }

    public function logout() {
        unset($_SESSION['authuser']);
        session_destroy();

        return true;
    }
}