<?php
include('function.php');
$url = '/payment/rest/payment_pro_api/get_seller_info';
$arrayGet = array('business' => 'dev.baokim@bk.vn');
$signature = makeSignature('GET',$url, $arrayGet, array(), PRIVATE_KEY_BAOKIM);

$url_signature = $uri.$url.'?signature='.$signature.'&business='.$arrayGet['business'];


$curl = curl_init($url_signature);

curl_setopt_array($curl, array(
	CURLOPT_POST=>false,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>50,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>HTTP_USER.':'.HTTP_PWD,
	
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($data,true);
?>