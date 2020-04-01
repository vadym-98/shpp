<?php

/**
 * This script adds new user to database, in case
 * his login is found for the first time.
 */

include "headers_settings.php"; //  add headers for cors
include "configDB.php";         //  sets for database connection

$userData = json_decode(file_get_contents("php://input"), true);    // input data from user

$login = filter_var(trim($userData["login"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($userData["pass"]), FILTER_SANITIZE_STRING);
/**
 * Checks if both fields are set, and if login field
 * is not found in database. Otherwise send error message
 */
if (!isset($login) || !isset($password)) {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(["error"=>"both field have to be filled"]);
    exit();
} else {
    $request = $pdo->query("SELECT `login` FROM `users` WHERE `login` = '$login'");
    $result = $request->fetch(PDO::FETCH_LAZY);
    if (isset($result["login"])) {
        header("HTTP/1.1 400 Bad Request. User with this login already exists");
        echo json_encode(["error"=>"user with this login already exists"]);
        exit();
    }
}

/**
 * add new user to our database
 */
$password = md5($password."asdfgh123");
if ($login != "" && $password != "") {
    $query = $pdo->prepare("INSERT INTO `users` (`login`, `password`) VALUES (:login, :password)");
    $query->execute(["login"=>$login, "password"=>$password]);
    echo json_encode(["ok"=>true]);
}
