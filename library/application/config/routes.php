<?php

return [
    //AdminController
    "admin/view" =>[
        "controller" => "admin",
        "action" => "view"
        ] ,
    "admin/view/{page:\d+}" =>[
        "controller" => "admin",
        "action" => "view"
    ] ,
    "admin/logout" =>[
        "controller" => "admin",
        "action" => "logout"
    ] ,
    "admin/add" =>[
        "controller" => "admin",
        "action" => "add"
    ] ,
    "admin/delete" =>[
        "controller" => "admin",
        "action" => "delete"
    ] ,
    //MainController
    "" => [
        "controller" => "main",
        "action" => "index"
    ],
    "\?book_name=[\w%]+" => [
        "controller" => "main",
        "action" => "index"
    ],
    "{offset:\d+}" => [
        "controller" => "main",
        "action" => "index"
    ],
    "book/{img:\d+}" => [
        "controller" => "main",
        "action" => "book"
    ],
    "statistic" => [
    "controller" => "main",
    "action" => "statistic"
    ],
    "click" => [
    "controller" => "main",
    "action" => "click"
    ]
];