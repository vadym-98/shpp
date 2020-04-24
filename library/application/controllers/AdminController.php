<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Error;
use application\lib\DB;
use application\lib\Pagination;

class AdminController extends Controller {

    public function deleteAction() {
        $this->model->deleteBook($_POST["del"]);
        $this->view->redirect("/admin/view");
    }

    public function addAction() {
        $userData = $this->validateUserData();
        $this->model->addBook($userData['img'], $userData["book_name"], $userData['authors'], $userData["year"], $userData["description"]);
        $this->view->redirect("/admin/view");
    }

    private function validateUserData() {
        $userData['book_name'] = filter_var(trim($_POST["book_name"]), FILTER_SANITIZE_STRING);
        $userData['book_name'] = ($userData['book_name'] !== '') ? $userData['book_name'] : Error::showWrongBookName();
        preg_match("/\d+/", $_POST["image"], $matches);
        $userData['img'] = $matches[0] ?? Error::showEmptyImage();
        $authors[] = filter_var(trim($_POST["author1"]), FILTER_SANITIZE_STRING);
        $authors[0] = ($authors[0] !== '') ? $authors[0] : Error::showWrongAuthorName();
        if (trim($_POST['author2']) !== '') {
            $authors[] = filter_var(trim($_POST["author2"]), FILTER_SANITIZE_STRING);
            if (trim($_POST['author3']) !== '') {
                $authors[] = filter_var(trim($_POST["author3"]), FILTER_SANITIZE_STRING);
                if (trim($_POST['author4']) !== '') $authors[] = filter_var(trim($_POST["author4"]), FILTER_SANITIZE_STRING);
            }
        }
        $userData['authors'] = $authors;
        $userData['year'] = (preg_match('/^\d{4}$/', trim($_POST["year"]).'', $match)) ?
            (int)$match[0] : Error::showWrongYear();
        $userData['description'] = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
        $userData['description'] = ($userData['description'] !== '') ? $userData['description'] : Error::showWrongDescription();
        return $userData;
    }

    public function viewAction() {
        $status = require "application/config/login.php";
        $row = $this->model->getInfo();
        $pagination = new Pagination($this->route, 2, 4, $this->route['page'] ?? 1, $row);
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
