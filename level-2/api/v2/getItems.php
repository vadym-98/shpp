<?php

/**
 * This script returns all data from database,
 * but user has to be signed in.
 */

if (!isset($_SESSION)) {
    session_start();
}
include "headers_settings.php"; //  add headers for cors
include "createTable.php";      // create table in case it doesnt exist

/**
 * if cookies time run out, or you end session it will ask you to sign in again.
 */
include "checkAuthorization.php";
if (isset($hash["hash"])) {
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
    exit();
}

echo json_encode(["error" => "Sign in please!"]);
