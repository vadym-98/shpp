<?php

/**
 * This script creates a new table "todos" if
 * it doesnt exist
 */

include "connectDB.php";
$query = $pdo->query("CREATE TABLE IF NOT EXISTS `todos`( ".
                                "id INT(11) unsigned NOT NULL AUTO_INCREMENT, ".
                                "text VARCHAR(255) collate utf8_general_ci NOT NULL, ".
                                "checked INT NOT NULL, ".
                                "UNIQUE KEY ( id )); ");