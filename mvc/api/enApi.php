<?php


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET') {
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Headers: X-Requested-With');
        header('Content-Type: application/json');
    }
    exit;
}

$root =  $_SERVER['DOCUMENT_ROOT'];
$sourcePath = $root . '\assets\lang\en\en.json';

if (file_exists($sourcePath)) {
    header("HTTP/1.1 200 OK");
    header('Content-Type: application/json');
    echo (file_get_contents($sourcePath));

} else {

    return http_response_code(404);
}
