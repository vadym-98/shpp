<?php

/**
 * This script sign in to todos notes
 * if login and password match to database values.
 */

include "headers_settings.php"; //  add headers for cors
include "configDB.php";         //  sets for database connection

session_start();

$userData = json_decode(file_get_contents("php://input"), true);

$login = $userData["login"];
$password = $userData["pass"];

/**
 * if one of the fields is empty
 * send error
 */
if (isset($login) && isset($password)) {
    $password = md5($password."asdfgh123");
    $query = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    $user = $query->fetch(PDO::FETCH_LAZY);
    if ($user != 0) {                                       //  if user exists set cookies and sign in. Either send error
        $_SESSION["login"] = $user["login"];
        setcookie("userId", $user["id"], time()+360, "/");
        setcookie("sessionId", $user["id"], time()+360, "/");
        echo json_encode(["ok"=>true]);
    } else {
        header("HTTP/1.1 400 Bad Request. No such user");
        echo json_encode(["error"=>"no such user"]);
    }
} else {
    echo json_encode(["error"=>"400 Bad Request"]);
}

