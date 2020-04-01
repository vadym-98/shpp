<?php

/**
 * This script returns all data from database,
 * but user has to be signed in.
 */

session_start();

include "headers_settings.php"; //  add headers for cors
include "createTable.php";      // create table in case it doesnt exist

/**
 * if cookies time run out, or you end session it will ask you to sign in again.
 */
if (isset($_COOKIE["sessionId"]) || isset($_SESSION["login"])) {
    $query = $pdo->query("SELECT * FROM `todos` ");
    $arr = [];
    while ($row = $query->fetch(PDO::FETCH_LAZY)) {
        $innerArray = array("id"=>$row[0], "text"=>$row[1], "checked"=>boolval($row[2]));
        $arr[] = $innerArray;
    }
    $arr = array(
        "items"=>$arr
    );
    echo json_encode($arr);
} else {
    echo json_encode(["error" => "Sign in please!"]);
}
