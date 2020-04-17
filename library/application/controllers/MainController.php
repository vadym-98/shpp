<?php


namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        //$result = $this->model->getNews();
        $row = $this->model->getMainInfo();
        $offset = $this->route['offset'] ?? 0;
        $books = [];
        for ($i = $offset, $j = 0; isset($row[$i]) && $j < LIMIT_OF_BOOKS; $j++, $i++) {
            $books[$j] = $row[$i];
        }
        $books ["offset"] = $offset;
        $this->view->render("Главная страница",$books);
    }

    public function bookAction() {
        $row = $this->model->getBookInfo($this->route["id"]);
        $vars = [
            "id"=>$this->route["id"],
            "book_name"=>$row[0]["book_name"],
            "authors"=>$row[0]["authors"],
            "year"=>$row[0]["year"],
            "description"=>$row[0]["description"]
        ];
        $this->view->render("Отдельная книга", $vars);
    }

    public function statisticAction() {
        $data = $_POST['id'];
        if (preg_match('/\d+/', $data, $matches)) {
            $this->model->sendStatistic($matches);
        }
//            file_put_contents('test.txt', $matches, FILE_APPEND | LOCK_EX);
    }

    public function clickAction() {
        $this->model->sendClicks($_POST["id"]);
    }
}