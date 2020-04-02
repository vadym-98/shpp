<?php

/**
 * This script destroy session and unset cookies.
 */

include "headers_settings.php"; //  add headers for cors
if(!isset($_SESSION)){
    session_start();
}
unset ($_SESSION['hash']);
setcookie("userHash", "", time() - 360, "/");
header("HTTP/1.1 200 OK");
echo json_encode(["ok" => true]);
