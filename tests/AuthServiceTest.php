<?php

use PHPUnit\Framework\TestCase;
use App\Services\AuthService;

class AuthServiceTest extends TestCase
{
    protected function setUp(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
    }

    public function test_user_is_not_logged()
    {
        $auth = new AuthService();

        $this->assertFalse(
            $auth->isLogged()
        );
    }

    public function test_user_is_logged()
    {
        $_SESSION['authuser'] = 1;

        $auth = new AuthService();

        $this->assertTrue(
            $auth->isLogged()
        );
    }

    public function test_logout_removes_session()
    {
        $_SESSION['authuser'] = 1;

        $auth = new AuthService();

        $auth->logout();

        $this->assertArrayNotHasKey(
            'authuser',
            $_SESSION
        );
    }

    public function test_password_hash_validation()
    {
        $password = 'Password123';

        $hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $this->assertTrue(
            password_verify($password, $hash)
        );
    }
}