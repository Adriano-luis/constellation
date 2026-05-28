<?php 

namespace App\Core;

class Controller { 
    public function loadView(string $viewName, array $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }

    public function loadMaster(string $viewName, array $viewData = array()) {
        require 'views/master.php';
    }

    public function loadViewInTemplate(string $viewName, array $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
}