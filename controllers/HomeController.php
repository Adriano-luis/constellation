<?php

class HomeController extends Controller
{
    public function __construct() {
        $auth = new AuthService();
        $auth->requireLogin();
    }

    public function index() {
        $this->loadMaster('home');
    }
}