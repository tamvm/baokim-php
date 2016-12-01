<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('call_restful.php');

function readF($myFile) {
  $fh = fopen($myFile, 'r');
  $theData = fread($fh, filesize($myFile));
  fclose($fh);
  return $theData;
}

$private_key = readF("keys/server.key");
$call_restful = new CallRestful();
$result1 = $call_restful->makeBaoKimAPISignature("post", "/payment/rest/payment_pro_api/pay_by_card?get1=a",
          array("get2" => "b"), array("post1" => "z"), $private_key);
echo $result1;
echo "<br>";
$result2 = $call_restful->makeBaoKimAPISignature("post", null,
          array("get2" => "b"), array("post1" => "z"), $private_key);
echo $result2;
