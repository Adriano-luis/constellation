<?php

class HomeController extends Controller
{
    public function __construct() {
        $auth = new AuthService();
        $auth->requireLogin();
    }

   public function index() {
        $data = array();

        $search = $_GET['search'] ?? '';
        $users = new User();

        $data['search'] = $search;
        $data['users'] = $users->getAll($search);

        $this->loadMaster('home', $data);
    }
}