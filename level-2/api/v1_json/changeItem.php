<?php

$fileName = "todos.json";
$userData = json_decode(file_get_contents("php://input"), true);    // datas from user
$serverData = json_decode(file_get_contents($fileName),true); // datas which we store on server
changeNote($userData, $serverData, $fileName);

/**
 * @param $userData - datas from user
 * @param $serverData -  datas which we store on server
 * @param $fileName - path to json file
 */
function changeNote($userData, $serverData, $fileName) {
    $item = $serverData["items"];
    for ($i = 0; $i < count($item); $i++) {
        if ($item[$i]["id"] === $userData["id"]) {
            $serverData["items"][$i]["text"] = $userData["text"];
            $serverData["items"][$i]["checked"] = $userData["checked"];
            file_put_contents($fileName, json_encode($serverData));
            echo json_encode(["ok"=>true]);
        }
    }
}
