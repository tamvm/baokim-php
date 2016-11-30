<?php

// public function verifyResponseUrl($url_params = array())
// {
// if(empty($url_params['checksum'])){
// echo "invalid parameters: checksum is missing";
// return FALSE;
// }

$checksum = $_GET['checksum'];
unset($_GET['checksum']);

ksort($_GET);
$file = "/tmp/bklog.log";
$fh = fopen($file, 'a');
var_dump($_GET);
fwrite($fh, implode('', $_GET));
if (strcasecmp($checksum, hash_hmac('SHA1', implode('', $_GET), '3ead8c83e15053f3')) == 0) {
	fwrite($fh, 'true');
} else {
	return FALSE;
}
$name = "hương+Quan-+Trí+Quả+-Thuận+Thành-+Bắc+Ninh%2C+Huyện+Thuận+Thành%2C+Bắc+Ninh";
echo urldecode($name);
?>