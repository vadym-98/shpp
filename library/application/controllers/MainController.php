<?php


namespace application\controllers;

use application\core\Controller;
use application\core\View;

class MainController extends Controller {

    public function indexAction() {
        //$result = $this->model->getNews();
        if (isset($_GET['book_name'])) {
            $row = $this->model->searchBook($_GET['book_name']);
        } else {
            $row = $this->model->getMainInfo();
        }
        $offset = $this->route['offset'] ?? 0;
        $booksAmount = count($row);
        $books = [];
        for ($i = $offset, $j = 0; isset($row[$i]) && $j < OFFSET; $j++, $i++) {
            $books[$j] = $row[$i];
        }
        $books ['offset'] = $offset;
        $books ['booksAmount'] = $booksAmount;
        $this->view->render("Главная страница",$books);
    }

    public function bookAction() {
        $row = $this->model->getBookInfo($this->route["img"]);
        if (($row[0]['deleted']) == 1) View::errorCode(404);
        $vars = [
            "img"=>$this->route["img"],
            "book_name"=>$row[0]["book_name"],
            "author_name"=>$row[0]["author_name"],
            "year"=>$row[0]["year"],
            "description"=>$row[0]["description"]
        ];
        $this->view->render("Отдельная книга", $vars);
    }

    public function statisticAction() {
        $data = $_POST['img'];
        if (preg_match('/\d+/', $data, $matches)) {
            $this->model->sendStatistic($matches);
        }
//            file_put_contents('test.json', $matches, FILE_APPEND | LOCK_EX);
    }

    public function clickAction() {
        $this->model->sendClicks($_POST["img"]);
    }
}