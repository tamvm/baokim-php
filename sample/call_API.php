<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../constants.php');
include('../call_restful.php');

$param = array(
  'business' => EMAIL_BUSINESS,
);
$call_restfull = new CallRestful();
$call_API = $call_restfull->call_API("GET", $param, BAOKIM_API_SELLER_INFO );
echo '<pre>';
var_dump($call_API);
echo '</pre>';

