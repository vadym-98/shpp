<?php

/**
 * set timezone for correct server time
 */
date_default_timezone_set("Europe/Kiev");

/**
 * transform request to string to use it in future
 */
function readHttpLikeInput()
{
    $f = fopen('php://stdin', 'r');
    $store = "";
    $toread = 0;
    while ($line = fgets($f)) {
        $store .= preg_replace("/\r/", "", $line);
        if (preg_match('/Content-Length: (\d+)/', $line, $m))
            $toread = $m[1] * 1;
        if ($line == "\r\n")
            break;
    }
    if ($toread > 0)
        $store .= fread($f, $toread);
    return $store;

}

$contents = readHttpLikeInput();

/**
 * print response
 */
function outputHttpResponse($statuscode, $statusmessage, $headers, $body)
{
    echo "HTTP/1.1 " . $statuscode . " " . $statusmessage . "\n" .
        $headers . $body;
}

/**
 * work with request and return response
 */
function processHttpRequest($method, $uri, $headers, $body)
{
    if ($method === "POST") {
        if ($uri === "/api/checkLoginAndPassword") {
            $i = 0;
            while ($i < count($headers) && $headers[$i][0] !== "Content-Type") $i++;
            if ($i < count($headers) && $headers[$i][1] === "application/x-www-form-urlencoded") {
                $login = substr($body, strpos($body, "=")+1, strpos($body, "&")-strpos($body, "=")-1);
                $password = substr($body, strrpos($body, "=")+1);
                $user = file_get_contents("passwords.txt");
                if ($user === false) {
                    outputHttpResponse("500", "Internal Server Error", "", "");
                } else {
                    if (preg_match("/{$login}:{$password}/", $user)) {
                        outputHttpResponse("200", "OK", "", "<h1 style=\"color:green\">FOUND</h1>");
                    } else {
                        echo "There is no such user";
                    }
                }
            }
            else {
                informAboutError();
            }
        } else {
            informAboutError();
        }
    }
}

function informAboutError() {
    $headers = "Date: " . date("D, d M Y H:i:s e") ."\n" .
        "Server: Apache/2.2.14 (Win32)\n".
        "Connection: Closed\n".
        "Content-Type: text/html; charset=utf-8\n";
    $sum = "not found";
    $headers .= "Content-Length: " . strlen($sum) . "\n";
    outputHttpResponse("404", "Not Found", $headers, $sum);
}

/**
 * transform string to array
 */
function parseTcpStringAsHttpRequest($string)
{
//    echo "<<< $string >>>";
    $method = substr($string, 0, strpos($string, " "));
    $index = strpos($string, "/");
    $uri = substr($string, $index, strpos($string, " ", $index)-$index);
    $index = strpos($string, "\n")+1;
    $emptyStringIndex = strlen($string)-1;
    while ($string[$emptyStringIndex] !== "\n") {
        $emptyStringIndex -= 1;
    }
    $headers = substr($string, $index, $emptyStringIndex-$index);
    $arr = array_filter(preg_split('/[\r\n]/', $headers));
    $hed = [];
    foreach ($arr as $item) {
        $hed[] = explode(":", $item);
    }
    for ($i = 0; $i < count($hed); $i++) {
        for ($j = 0; $j < count($hed[$i]); $j++) {
            $hed[$i][$j] = trim($hed[$i][$j]);
        }
    }
    $content = substr($string, $emptyStringIndex+1);
    return array(
        "method" => $method,
        "uri" => $uri,
        "headers" => $hed,
        "body" => $content
    );
}

$http = parseTcpStringAsHttpRequest($contents);
processHttpRequest($http["method"], $http["uri"], $http["headers"], $http["body"]);
