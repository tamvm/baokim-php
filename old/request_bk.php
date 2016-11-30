<?php
	include('function.php');

	$url = '/payment/rest/payment_pro_api/pay_by_card';
	$escrow_timeout = isset($_POST['escrow_timeout']) ? $_POST['escrow_timeout'] : '0';
	$arrayPost = array(
		'order_id' => '',
		'total_amount' => $_POST['total_amount'],
		'business' => 'dev.baokim@bk.vn',
		'order_description' => '',
		'shipping_fee' => '0',
		'tax_fee' => '0',
		'url_cancel' => 'http://4share.vn/cancel',
		'url_success' => 'http://4share.vn/success',
		'payer_name' => $_POST['payer_name'],
		'payer_email' => $_POST['payer_email'],
		'payer_phone_no' => $_POST['payer_phone_no'],
		'payer_address' => $_POST['address'],
		'message' => '',
		'bank_payment_method_id' => $_POST['bank_payment_method_id'],
		'transaction_mode_id' => '1', // 2- trực tiếp 
		'escrow_timeout' => $escrow_timeout,
		'mui' => 'charge',
		'currency' => 'VND' // USD
	);

	//ksort($arrayPost);
	$signature = makeSignature('POST',$url, array(), $arrayPost, PRIVATE_KEY_BAOKIM);
	$url_signature = $uri.$url.'?signature='.$signature;
    $curl = curl_init($url_signature);

	curl_setopt_array($curl, array(
		CURLOPT_POST=>true,
		CURLOPT_HEADER=>false,
		CURLINFO_HEADER_OUT=>true,
		CURLOPT_TIMEOUT=>50,
		CURLOPT_RETURNTRANSFER=>true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
		CURLOPT_USERPWD=>HTTP_USER.':'.HTTP_PWD,
		CURLOPT_POSTFIELDS=>$arrayPost
	));
	$data = curl_exec($curl);	
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$error = curl_error($curl);
	$result = json_decode($data,true);
	//var_dump($result); die;
	if($status == 200) {
		switch($result['next_action'])
		{
			case 'redirect' : 
				$url = $result['redirect_url'];
				echo "<script>window.location='".$url."'</script>"; 
			case 'display_guide' :
				$url = $result['guide_url'];
				echo "<script>window.location='".$url."'</script>";  
		}
	} elseif($status == 450) {
		var_dump($result); die;
	} else {
		echo $status;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '<pre>'.print_r($result, true).'</pre>';
		echo '<pre>'.print_r("error-".$error, true).'</pre>';die;


	}

?>
