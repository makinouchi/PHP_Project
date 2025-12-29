<?php
//require '../../selfphp/vendor/autoload.php';
require 'C:/xampp/selfphp/vendor/autoload.php';

$cli = new GuzzleHttp\Client([
  'base_uri' => 'http://localhost/'
]);
$res = $cli->get('PHP_PROJECT/3-2/sample.json');
$obj = json_decode($res->getBody());
print_r($obj);