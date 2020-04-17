<?php


namespace application\core;


class View {

    public $path;
    public $route;
    public $layout = "main";


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route["controller"] . "/" . $route["action"];
    }

    public function render($title, $vars =[]) {
        extract($vars);
        if (file_exists("application/views/" . $this->path . ".php")) {
            ob_start();
            require "application/views/" . $this->path . ".php";
            $content = ob_get_clean();
            require "application/views/layouts/" . $this->layout . ".php";
        } else {
            echo "Вид {$this ->path} не найден";
        }
    }

    public function redirect($url) {
        header("location: $url");
        exit();
    }

    public static function showError($id) {
         echo "<script>alert('Фото книги должно иметь уникальное числовое имя. Имя $id уже занято. Вернитесь назад!');</script>";
         exit();
    }

    public static function errorCode($code) {
        http_response_code($code);
        require "application/views/errors/" . $code . ".php";
        exit();
    }

    public function message($status, $message) {
        exit(json_encode(["status"=>$status, "message" => $message]));
    }

    public function location($url) {
        exit(json_encode(["url"=>$url]));
    }

}