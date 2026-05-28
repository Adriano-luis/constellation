<?php
namespace App\Core;

class Core {
    public function run() {
        $url = '/';
        $params = array();
        
        if(isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        if(!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = 'App\\Controllers\\'.ucfirst($url[0]).'Controller';
            array_shift($url);

            if(isset($url[0]) && $url[0] != '/') {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if(count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'App\\Controllers\\HomeController';;
            $currentAction = 'index';
        }

        if (!class_exists($currentController)) {
            http_response_code(404);
            echo "Page not found";
            exit;
        }

        $c = new $currentController();
        
        call_user_func_array(array($c, $currentAction), $params);
    }
}