<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

    public function deleteBook($img) {
        $this->db->query('UPDATE books SET deleted = :deleted WHERE img = :img', ['deleted'=>1, 'img'=>$img]);
//        $this->db->query("DELETE FROM `books` WHERE `img` = :img", ["img"=>$img]);
    }

    public function addBook($img, $book_name, $authors, $year, $description) {
        $this->db->query("INSERT INTO `books` (`img`, `book_name`, `year`, `description`) VALUES (:img, :book_name, :year, :description)",
            ["img"=>$img, "book_name"=>$book_name, "year"=>$year, "description"=>$description]);
        $book_id = $this->db->lastIndex();
        foreach ($authors as $author) {
            $this->db->query('INSERT INTO `authors` (`author_name`) VALUES (:author_name)', ['author_name'=>$author]);
            $author_id = $this->db->lastIndex();
            $this->db->query('INSERT INTO booksAuthors (`author_id`, `book_id`) VALUES (:author_id, :book_id)', ['author_id'=>$author_id, 'book_id'=>$book_id]);
        }
    }

    public function getInfo() {
        return $this->db->row("SELECT * FROM (SELECT books.img, books.book_name, GROUP_CONCAT(authors.author_name SEPARATOR ', ')
            AS author_name, books.year, books.clicks, books.deleted FROM books
            LEFT JOIN booksAuthors ON booksAuthors.book_id = books.id
            LEFT JOIN authors ON authors.id = booksAuthors.author_id
            GROUP BY books.id) AS result WHERE deleted = (:deleted)", ['deleted'=>0]);
    }

    public function isAdmin() {
        return $this->db->row("SELECT * FROM users WHERE login = (:login)", ["login"=>htmlentities($_SERVER['PHP_AUTH_USER'])]);
    }
}