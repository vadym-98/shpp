<?php

/**
 * This script adds new note to database
 */

session_start();

include "headers_settings.php"; //  add headers for cors
include "configDB.php";         //  sets for database connection

/**
 * if cookies time run out, or you end session it will ask you to sign in again.
 */
if (isset($_COOKIE["sessionId"]) || isset($_SESSION["login"])) {
    $text = json_decode(file_get_contents("php://input"), true);// read user todos task
    if ($text['text'] !== "") {
        $query = $pdo->prepare("INSERT INTO `todos` (`text`, `checked`) VALUES (:text, :checked)");
        $query->execute(["text"=>$text["text"], "checked"=>0]);
        $id = $pdo->query("SELECT `id` FROM `todos` WHERE `text` LIKE '%{$text['text']}%'");
        while ($row = $id->fetch(PDO::FETCH_LAZY)) {
            echo json_encode(["id" => $row[0]]);
        }
    }
} else {
    echo json_encode(["error" => "Sign in please!"]);
}
