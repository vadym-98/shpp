<?php

/**
 * This script creates a connection to database
 */
$dsn = "mysql:host=localhost;dbname=todos";
$pdo = new PDO($dsn, "root", "password");