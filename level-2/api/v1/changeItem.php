<?php

/**
 * This script changes boolean value of "checked"
 * in table, and "text" to a new one.
 */

session_start();

include "headers_settings.php"; //  add headers for cors
include "configDB.php";         //  sets for database connection

$userData = json_decode(file_get_contents("php://input"), true);    // data from user
if ($userData["text"] !== "") {
    $serverData = $pdo->prepare("UPDATE `todos` SET `text` = ?, `checked` = ? WHERE `id` = ?");
    $serverData->execute([$userData['text'], (int)$userData['checked'], $userData['id']]);
    echo json_encode(['ok'=>true]);
} else {
    echo json_encode(["error"=>"empty field"]);
}
