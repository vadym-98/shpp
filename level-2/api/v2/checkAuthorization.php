<?php
/**
 * This script checks cookies. If time run out, or you end session it will ask you to sign in again.
 */

$value = isset($_COOKIE["userHash"]) ? $_COOKIE["userHash"] : isset($_SESSION["hash"]) ? $_SESSION["hash"] : false;
if ($value) {
    $check = $pdo->query("SELECT `hash` FROM `users` WHERE `hash` = '$value'");
    $hash = $check->fetch(PDO::FETCH_LAZY);
}