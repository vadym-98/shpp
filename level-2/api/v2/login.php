<?php

/**
 * This script sign in to todos notes
 * if login and password match to database values.
 */

include "headers_settings.php"; //  add headers for cors
include "connectDB.php";         //  sets for database connection

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
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $hash = md5(substr(str_shuffle($permitted_chars), 0, 10));
        $_SESSION["hash"] = $hash;
        setcookie("userHash", $hash, time()+360, "/");
        $query = $pdo->prepare("UPDATE `users` SET `hash` = ? WHERE `id` = ?");
        $query->execute([$hash, $user["id"]]);
        echo json_encode(["ok"=>true]);
    } else {
        header("HTTP/1.1 400 Bad Request. No such user");
        echo json_encode(["error"=>"no such user"]);
    }
} else {
    echo json_encode(["error"=>"400 Bad Request"]);
}

