<?php

use application\lib\DB;

require "application/lib/Dev.php";

spl_autoload_register(function ($class) {
    $path = str_replace("\\", "/", $class.".php");
    if (is_file($path)) {
        require_once $path;
    }
});

$db = new DB();
$row = $db->row('SELECT * FROM books WHERE deleted = :deleted', ['deleted'=>1]);
foreach ($row as $book) {
    $db->query('DELETE FROM authors, booksAuthors, books USING authors INNER JOIN booksAuthors INNER JOIN books
        ON authors.id=booksAuthors.author_id AND booksAuthors.book_id=books.id WHERE book_id = :book_id', ['book_id'=>$book['id']]);
}