<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

    public function deleteBook($id) {
        $this->db->query("DELETE FROM `books` WHERE `id` = :id", ["id"=>$id]);
    }

    public function addBook($id, $book_name, $authors, $year, $description) {
        $this->db->query("INSERT INTO `books` (`id`, `book_name`, `authors`, `year`, `description`) VALUES (:id, :book_name, :authors, :year, :description)",
            ["id"=>$id, "book_name"=>$book_name, "authors"=>$authors, "year"=>$year, "description"=>$description]);
    }

    public function getInfo() {
        return $this->db->row("SELECT `id`, `book_name`, `authors`, `year` FROM `books`");
    }

    public function isAdmin() {
        return $this->db->row("SELECT * FROM users WHERE login = (:login)", ["login"=>htmlentities($_SERVER['PHP_AUTH_USER'])]);
    }
}