<?php

/**
 * This script process querystring to call right php
 * script. If no scripts available send error.
 */

if (!isset($_SESSION)) {
    session_start();
}
include "headers_settings.php";

switch ($_GET["action"]) {
    case "login" :
        require "login.php";
        break;
    case "logout" :
        require "logout.php";
        break;
    case "register" :
        require "register.php";
        break;
    case "getItems" :
        require "getItems.php";
        break;
    case "addItem" :
        require "addItem.php";
        break;
    case "changeItem" :
        require "changeItem.php";
        break;
    case "deleteItem" :
        require "deleteItem.php";
        break;
    default :
        header("HTTP/1.1 400 Bad Request");
}