<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$url = $_SERVER['REQUEST_SCHEME'] . '://' . trim($_SERVER['QUERY_STRING'], '/');

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CONNECTTIMEOUT => 0,
  CURLOPT_BINARYTRANSFER => 1,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_VERBOSE => 1,
  CURLOPT_HEADER => 0,
  CURLOPT_URL => $url,
  CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT']
  ));

$resp = curl_exec($curl);

curl_close($curl);

print($resp);