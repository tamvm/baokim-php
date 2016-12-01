<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../call_restful.php');

$call_restful = new CallRestful();
echo $call_restful->createRequestUrl(array(
  'fruit' => 'apple',
  'veggie' => 'carrot',
  'friend' => 'nothing',
));
