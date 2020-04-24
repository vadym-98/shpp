<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function searchBook($name) {
        return $this->db->row("SELECT * FROM (SELECT books.img, books.book_name, GROUP_CONCAT(authors.author_name) AS author_name, books.deleted FROM books
          LEFT JOIN booksAuthors ON booksAuthors.book_id = books.id
          LEFT JOIN authors ON authors.id = booksAuthors.author_id
        GROUP BY books.id) AS result WHERE deleted = (:deleted) AND book_name LIKE (:book_name)", ['deleted'=>0, 'book_name'=>"$name%"]);
    }

    public function sendClicks($img) {
        $clicks = $this->db->row('SELECT `clicks` FROM `books` WHERE `img` = :img', ['img'=>$img]);
        $this->db->query('UPDATE `books` SET `clicks` = :clicks WHERE `img` = :img', ['clicks'=>++$clicks[0]['clicks'], 'img'=>$img]);
    }

    public function sendStatistic($img) {
        $statistic = $this->db->row('SELECT `statistic` FROM `books` WHERE `img` = :img', ['img'=>$img[0]]);
        $this->db->query('UPDATE `books` SET `statistic` = :statistic WHERE `img` = :img', ['statistic'=>++$statistic[0]['statistic'], 'img'=>$img[0]]);
    }

    public function getMainInfo() {
        return $this->db->row("SELECT * FROM (SELECT books.img, books.book_name, GROUP_CONCAT(authors.author_name) AS author_name, books.deleted FROM books
          LEFT JOIN booksAuthors ON booksAuthors.book_id = books.id
          LEFT JOIN authors ON authors.id = booksAuthors.author_id
        GROUP BY books.id) AS result WHERE deleted = (:deleted)", ['deleted'=>0]);
    }

    public function getBookInfo($img) {
        return $this->db->row("SELECT * FROM (SELECT books.*, GROUP_CONCAT(authors.author_name) AS author_name FROM books
            LEFT JOIN booksAuthors ON booksAuthors.book_id = books.id
            LEFT JOIN authors ON authors.id = booksAuthors.author_id
        GROUP BY books.id) AS current_book WHERE img = (:img)", ["img"=>$img]);
    }

//    public function getNews() {
//        return $this->db->row("SELECT `title`, `text` FROM news ");
//    }
}
