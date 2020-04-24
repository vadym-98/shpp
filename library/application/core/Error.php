<?php

namespace application\core;

class Error {

    public static function showWrongImage($id) {
        echo "<script>alert('Фото книги должно иметь уникальное числовое имя. Имя $id уже занято. Вернитесь назад!');</script>";
        exit(400);
    }

    public static function showEmptyImage() {
        echo "<script>alert('Это поле не может быть пустым. Укажите файл с картинкой книги. Название файла должно быть числовым, ' +
            'и уникальным.');</script>";
        exit(400);
    }

    public static function showWrongBookName() {
        echo "<script>alert('Неверное имя книги');</script>";
        exit(400);
    }

    public static function showWrongAuthorName() {
        echo "<script>alert('Неверное имя автора!');</script>";
        exit(400);
    }

    public static function showWrongYear() {
        echo "<script>alert('Неверный формат года. Должно быть хххх!');</script>";
        exit(400);
    }

    public static function showWrongDescription() {
        echo "<script>alert('Должно быть описание книги!');</script>";
        exit(400);
    }
}