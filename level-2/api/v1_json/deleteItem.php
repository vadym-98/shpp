<?php

$fileName = "todos.json";
$inputData = json_decode(file_get_contents("php://input"), true);
$serverData = json_decode(file_get_contents($fileName),true); // datas which we store on server
deleteNote($inputData["id"], $serverData);

function deleteNote($id, $serverData) {
    $dataNotes = $serverData["items"];
    for ($i = 0; $i < count($dataNotes); $i++) {
        if ($dataNotes[$i]["id"] !== $id) {
            $newServerData[] = $dataNotes[$i];
        }
    }
    if (isset($newServerData)) {
        $serverData["items"] = $newServerData;
    } else {
        $serverData["items"]=[];
    }
    file_put_contents("todos.json", json_encode($serverData));
    echo json_encode(["ok"=>true]);
}