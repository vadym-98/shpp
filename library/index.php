<?php

use application\core\Router;
use application\lib\DB;

require 'application/lib/constants.php';
require "application/lib/Dev.php";

spl_autoload_register(function ($class) {
    $path = str_replace("\\", "/", $class.".php");
    if (is_file($path)) {
        require_once $path;
    }
});

session_start();

$router = new Router();
$router->run();

