<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\DB;
use application\lib\Pagination;

class AdminController extends Controller {

    public function deleteAction() {
        $this->model->deleteBook($_POST["del"]);
        $this->view->redirect("/admin/view");
    }

    public function addAction() {
        preg_match("/\d+/", $_POST["image"], $matches);
        $id = $matches[0];
        $this->model->addBook($id, $_POST["book_name"], $_POST["author1"], $_POST["year"], $_POST["description"]);
        $this->view->redirect("/admin/view");
    }

    public function viewAction() {
        $status = require "application/config/login.php";
        $row = $this->model->getInfo();
        $pagination = new Pagination($this->route, 2, 2, $this->route['page'] ?? 1, $row);
        $booksPagination = $pagination->getPagination();
        if ($status == 1) {
            $this->view->layout = "admin";
            $this->view->render("Админка", $booksPagination);
        }
    }


    public function logoutAction() {
        echo "<script src=\"../public/js/jquery.js\"></script>";
        echo "<script>
                logout();
                function logout() {
                    jQuery.ajax({
                            type: \"GET\",
                            url: \"/admin/view\",
                            async: false,
                            username: \"logmeout\",
                            password: \"123456\",
                            headers: { \"Authorization\": \"Basic xxx\" }
                    })
                    .done(function(){
                        // If we don't get an error, we actually got an error as we expect an 401!
                    })
                    .fail(function(){
                        // We expect to get an 401 Unauthorized error! In this case we are successfully 
                            // logged out and we redirect the user.
                        window.location = \"/\";
                    });
                 
                    return false;
                }
              </script>";
    }
//    public function loginAction() {
//        $this->view->redirect("/");
//
//        if (!empty($_POST)) {
//            $this->view->location("/");
//        }
//        $this->view->render("Вход");
//    }
//
//    public function registerAction() {
//        $this->view->layout = "custom";
//        $this->view->render("Регистрация");
//    }
}
