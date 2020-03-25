<?php

date_default_timezone_set("Europe/Kiev");
function readHttpLikeInput()
{
    $f = fopen( 'php://stdin', 'r' );
    $store = "";
    $toread = 0;
    while( $line = fgets( $f ) ) {
        $store .= preg_replace("/\r/", "", $line);
        if (preg_match('/Content-Length: (\d+)/',$line,$m))
            $toread=$m[1]*1;
        if ($line == "\r\n")
            break;
    }
    if ($toread > 0)
        $store .= fread($f, $toread);
    return $store;

}

$contents = readHttpLikeInput();

function outputHttpResponse($statuscode, $statusmessage, $headers, $body)
{
    echo "HTTP/1.1 " . $statuscode . " " . $statusmessage . "\n".
    $headers . $body;
}

function processHttpRequest($method, $uri, $headers, $body)
{
    if ($method === "GET") {
        $headers = "Date: " . date("D, d M Y H:i:s e") ."\n" .
            "Server: Apache/2.2.14 (Win32)\n".
            "Connection: Closed\n".
            "Content-Type: text/html; charset=utf-8\n";
        if (preg_match_all('/(\/sum)(\?nums=)((\d+,?)+)/m', $uri, $matches)){
            $numbs = explode(",", $matches[3][0]);
            $sum = 0;
            foreach ($numbs as $elem) {
                $sum += $elem;
            }
            $headers .= "Content-Length: " . strlen($sum) . "\n";
            outputHttpResponse("200", "OK", $headers, $sum);
        } else {
            $sum = "not found";
            $headers .= "Content-Length: " . strlen($sum) . "\n";
            if (preg_match_all('/(\/sum)/m', $uri, $matches)) {
                outputHttpResponse("400", "Bad Request", $headers, $sum);
            } else {
                outputHttpResponse("404", "Not Found", $headers, $sum);
            }
        }
    }
}

function parseTcpStringAsHttpRequest($string)
{
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
?>
<?php
//$method = "GET";
//$uri = "/sum?nums=1,2,3";
//if ($method === "GET") {
//    if (preg_match_all('/(\/sum)(\?nums=)((\d+,?)+)/m', $uri, $matches)){
//        $numbs = explode(",", $matches[3][0]);
//        $sum = 0;
//        foreach ($numbs as $elem) {
//            $sum += $elem;
//        }
//        echo "{$_SERVER["SERVER_PROTOCOL"]} 200 OK\n
//        Date: " . date("D, d M Y H:i:s e") ."\n".
//        "Server: {$_SERVER["SERVER_NAME"]}\n
//        Content-Length: " . strlen($sum) . "\n
//        Connection: {$_SERVER["HTTP_CONNECTION"]}\n
//        Content-Type: {$_SERVER["HTTP_ACCEPT"]}; {$_SERVER["HTTP_ACCEPT_CHARSET"]}\n\n
//        $sum";
//    }
//}
