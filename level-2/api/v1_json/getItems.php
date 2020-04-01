<?php

if (file_get_contents("todos.json") === "{}") { // if file is empty set up base syntax
    file_put_contents("todos.json", json_encode(array("items"=>[])));
}
echo file_get_contents("todos.json");