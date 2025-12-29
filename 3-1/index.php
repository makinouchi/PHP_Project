<?php
//require '../../selfphp/vendor/autoload.php';
require 'C:/xampp/selfphp/vendor/autoload.php';

$cli = new GuzzleHttp\Client([
  'base_uri' => 'http://localhost/'
]);
$res = $cli->request('get', 'PHP_PROJECT/3-1/test/test.html');
print $res->getBody();