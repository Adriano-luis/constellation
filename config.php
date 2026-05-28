<?php
require "environment.php";

$config = array();

if(ENVIRONMENT == 'development') { 
    $config['dbname'] = DBNAME;
    $config['host'] = DBHOST;
    $config['dbuser'] = DBUSER;
    $config['dbpass'] = DBPASS;
    $config['dbport'] = DBPORT;
}

global $db;

try {
    $db = new PDO(
    "mysql:host=".$config['host'].";port=".$config['dbport'].";dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}