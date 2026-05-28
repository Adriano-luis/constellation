<?php 
class LoginController extends Controller { 

    public function __construct() {
        // parent::__construct();
    }

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

    public function logout() {
        $auth = new AuthService();
        $auth->logout();

        header("Location: ".BASE_URL.'login');
        exit;
    }
}