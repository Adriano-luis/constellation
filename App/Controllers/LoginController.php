<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Services\AuthService;

class LoginController extends Controller { 

    public function index() {
        $data = array();

        if ( isset($_POST['email']) && !empty($_POST['email'])) {

            $email = trim($_POST['email']);
            $password = $_POST['pass'];

            $auth = new AuthService();

            if ($auth->authenticate($email, $password)) {

                header("Location: ".BASE_URL);
                exit;

            } else {
                $data['error'] = 'Invalid email or password';
            }
        }

        $this->loadView('login', $data);
    }

    public function createAccount() {
        $data = [
            'errors' => [],
            'old' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['pass'] ?? '';
            $passwordCheck = $_POST['pass_check'] ?? '';

            $data['old'] = [
                'name' => $name,
                'email' => $email
            ];

            if ($name == '') {
                $data['errors'][] = 'Name is required.';
            }

            if ($email == '') {
                $data['errors'][] = 'Email is required.';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['errors'][] = 'Invalid email.';
            }

            if ($password == '') {
                $data['errors'][] = 'Password is required.';
            } else if (strlen($password) < 6) {
                $data['errors'][] = 'Password must have at least 6 characters.';
            } else if (!preg_match('/[0-9]/', $password)) {
                $data['errors'][] = 'Password must have at least one number.';
            }

            if ($password != $passwordCheck) {
                $data['errors'][] = 'Passwords do not match.';
            }

            if (empty($data['errors'])) {
                $users = new User();

                if ($users->emailExists($email)) {
                    $data['errors'][] = 'Email already registered.';
                } else {
                    $users->create($name, $email, $password);

                    header('Location: '.BASE_URL.'login');
                    exit;
                }
            }
        }

        $this->loadView('create', $data);
    }

    public function logout() {
        $auth = new AuthService();
        $auth->logout();

        header("Location: ".BASE_URL.'login');
        exit;
    }
}