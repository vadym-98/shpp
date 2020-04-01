<?php

/**
 * This script destroy session and unset cookies.
 */

include "headers_settings.php"; //  add headers for cors

session_start();

unset ($_SESSION['login']);
setcookie("sessionId", "", time() - 360, "/");
setcookie("userId", "", time() - 360, "/");
header("HTTP/1.1 200 OK");
echo json_encode(["ok" => true]);
