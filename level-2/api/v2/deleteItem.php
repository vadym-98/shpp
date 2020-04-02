<?php

/**
 * This script deletes stated note
 * from "todos" table
 */

include "headers_settings.php"; //  add headers for cors
include "connectDB.php";         //  sets for database connection

$inputData = json_decode(file_get_contents("php://input"), true);
$serverData = $pdo->prepare("DELETE FROM `todos` WHERE `id` = ?");
$serverData->execute([$inputData['id']]);
echo json_encode(["ok" => true]);
