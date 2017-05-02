<?php
/* DOCUMENTATION 
Requires: Apache 2 Mod_rewrite, .htaccess file
Works only with HTTPS currently
Can work in subdir or own subdomain
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$request = $_SERVER['REQUEST_URI'];
$request = ltrim($request, $_SERVER['SCRIPT_NAME']);
$request = ltrim($request, trim(dirname($_SERVER['SCRIPT_NAME']), '/'));

$url = 'https://' . trim($request, '/');

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

print_r($resp);
