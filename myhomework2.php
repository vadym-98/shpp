<?php


function readHttpLikeInput() {
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


function parseTcpStringAsHttpRequest($string) {
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
echo(json_encode($http, JSON_PRETTY_PRINT));
