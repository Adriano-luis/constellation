<?php
session_start();

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';

use App\Core\Core;

$core = new Core();
$core->run();