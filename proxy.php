<?php
$url = $_GET['url'] ?? '';
if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
  http_response_code(400);
  exit('Invalid URL');
}

$opts = [
  "http" => [
    "method" => "GET",
    "header" => "User-Agent: VLC/3.0.16\r\n"
  ]
];
$context = stream_context_create($opts);
header('Content-Type: application/vnd.apple.mpegurl');
readfile($url, false, $context);
