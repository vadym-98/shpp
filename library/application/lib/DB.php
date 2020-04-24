<?php

namespace application\lib;

use application\core\Error;
use application\core\View;
use PDO;

class DB {

    protected $db;

    public function __construct() {
        $config = require "application/config/db.php";
        $this->db = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config["user"], $config["password"]);
        $this->db->query("SET NAMES utf8");
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $stmt->bindValue(":" . $k, $v);
            }
        }
        $result = $stmt -> execute($params);
        if ($result == false) {
            Error::showWrongImage($params["img"]);
        }
        return $stmt;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(2);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function lastIndex() {
        return $this->db->lastInsertId();
    }
}
