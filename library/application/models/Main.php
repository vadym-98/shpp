<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function sendClicks($id) {
        $clicks = $this->db->row('SELECT `clicks` FROM `books` WHERE `id` = :id', ['id'=>$id]);
        $this->db->query('UPDATE `books` SET `clicks` = :clicks WHERE `id` = :id', ['clicks'=>++$clicks[0]['clicks'], 'id'=>$id]);
    }

    public function sendStatistic($id) {
        $statistic = $this->db->row('SELECT `statistic` FROM `books` WHERE `id` = :id', ['id'=>$id[0]]);
        $this->db->query('UPDATE `books` SET `statistic` = :statistic WHERE `id` = :id', ['statistic'=>++$statistic[0]['statistic'], 'id'=>$id[0]]);
    }

    public function getMainInfo() {
        return $this->db->row("SELECT `id`, `book_name`, `authors` FROM `books`");
    }

    public function getBookInfo($id) {
        return $this->db->row("SELECT * FROM `books` WHERE `id`= (:id)", ["id"=>$id]);
    }

//    public function getNews() {
//        return $this->db->row("SELECT `title`, `text` FROM news ");
//    }
}
