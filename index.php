<?php
session_start();

require "config.php";

spl_autoload_register(function($class) {
    $folders = array(
        'controllers/',
        'models/',
        'core/',
        'services/',
        'traits/'
    );

    foreach ($folders as $folder) {
        $file = $folder.$class.'.php';

        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

$core = new Core();
$core->run();