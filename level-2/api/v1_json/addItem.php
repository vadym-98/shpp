<?php

$text = json_decode(file_get_contents("php://input"), true); // read users todos task
$file = json_decode(file_get_contents("todos.json"), true); // read todos file content
$id = file_get_contents("id");
if ($id === "") {
    $id = 1;
}
$file["items"][] = array(
    "id" => $id++,
    "text" => $text["text"],
    "checked" => false
);
file_put_contents("todos.json", json_encode($file));
file_put_contents("id", $id);
echo json_encode(["id"=>$id]);
