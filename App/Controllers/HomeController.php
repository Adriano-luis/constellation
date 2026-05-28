<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct() {
        $auth = new AuthService();
        $auth->requireLogin();
    }

   public function index() {
        $data = array();

        $search = $_GET['search'] ?? '';
        $page = (int) ($_GET['page'] ?? 1);

        if ($page < 1) {
            $page = 1;
        }

        $limit = 10;
        $offset = ($page - 1) * $limit;

        $users = new User();

        $total = $users->getTotal($search);
        $pages = ceil($total / $limit);

        $data['search'] = $search;
        $data['users'] = $users->getAll($search, $offset, $limit);
        $data['page'] = $page;
        $data['pages'] = $pages;
        $data['total'] = $total;

        $this->loadMaster('home', $data);
    }
}