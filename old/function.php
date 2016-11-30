<?php

/*define('PRIVATE_KEY_BAOKIM','-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC94E4I0TtLyMsp
DHKoZN85Qm9iigDZYLT8uKxAY6/nKBCI69AqhREMC8Zox0jAGMFnjyTnfND5z+jh
qMzZCpPZ3DXC2I7hEEY63xbelP+QSoOI3v8DNPrvBKaRN0aQkA3jif/Mf/quAfLR
HRNk1fm7qECCk/KbOQ5sl6RSMa0syvTWX/+c1Zf71uv1KzmI8la10s1giIuGsGew
87Bzmejs4mvO3e/fCBybEfI8lJEnXZlaVbFVIdABm0pHhdGhsfwY4kJrVnUBy4fU
Ahi+d4IY8b/R8cRJGCD/7L3nSPFgJ4iZgbJEqwFvGyY2NNCGZjpA2pNfFQqNQ3kK
+IL/jXsLAgMBAAECggEBAKLjcE5EIJhM82yNjzdDAfS/N4rTVRMm0V0UmEDMxDSL
vFOZ6QTxDsTEvTtZ6uFQ22oZ9NDZ1PTaFbCw/LsdReVZ8ozq9vfA3F7Yz2e3bt67
7cdXdnGr27F8zeA6CUEvM5sF4fnvuH/akBIw3Vhd8FW6a00Z2sCq2+Lw3DjfAO8w
2rq7MTeIbFejfpOKu+FSAzBUDH+qcW1TCRWP4ZVwZbcOexFDD93mY8QZyGOE2pTX
vo3r/x+mTAKNd8spPF4hKm38kmDwyMdifO0keQy56BFj2wZpmoIebA3KkoFn7O1e
MhFjSBTWjEAjfSWVg5MyyWpisi2XKs44VvG6CWG4ASECgYEA6EWkvLegp8Q4xyaX
s1WHsWnBlKrtt11IOvbWkovtReXoyaShJpczxZwv4dhYlyj0mtrdqO5B2eZBtLmh
D4LjnoU7dI64lzOESeFyH/ZmcCaC6l4PCoBJBFgPkk9OTudNupqNBaaAI053uOFW
tYCYWE440wRygTXB6Kw1C9LhL+MCgYEA0UXt0CpGKOgSLAYcxlbn9iCMr+i1JsLV
33HBlGC7BS6uAFR7rCAfcdu7qJrjKsCzhszdW+KVaj3NnJ5FnrBX4lRtjF5Dpaca
t7cyvGhJXUysENPXNekm6M0GmHcMC5Xgxh7XaqzfOysHxxUzAvyYfKXjgjn40jnZ
a63CmrzMoLkCgYEAyGHExFZ60CFVhmIB/+Hq5aDCM5re6BEezlfDN7xl36aAFO3l
ZSCOto2PNXzquMXJeIsXLbUWtICT8PEwROx7qHdympTCJRd5qi9HwNFXAKwIx16M
BVg1Jf0+uc+XVDTyduj8foJtC4iXerVUk9M0GwKovUuZ6WTSPAPM471zLlcCgYBf
+zypXtoy5M2A14TXCwD0h9U+0PJUxsOk6d2pGfxs0g4IJLdcKJeDdw5ItFFASIWO
a+OSwwdYZOQq0wSHVcXZDnP4DzvjfBLq8+EXPJV5bzLzvNVV6otn9rDxuJgTsDgZ
ZgfS61qvHntAud5dnlCpysPf9IrEkLfBhT5eDf2kMQKBgDNYQcjZoK+eoVnkWj0G
xm7cDOOpbVEfiE3Ll1+2MuBtTu854RI2ZV2QaxcPJBdFrsdplSI9baPuyHyrx3n+
q4r4NRhP0m5YShxDFpXCp5Tb5sUBQT8NxAj5/hZHREPKTOcQ40GorHjfTpmXBeuA
QdVcUsgcfe3OiWlgBVwLvZLV
-----END PRIVATE KEY-----
');
define('HTTP_USER','nongdanpro');
define('HTTP_PWD','TQeBIQgfiimgwkuWwDbFGamA2pc6H');*/

//Phương thức thanh toán bằng thẻ nội địa
    define('PAYMENT_METHOD_TYPE_LOCAL_CARD', 1);
//Phương thức thanh toán bằng thẻ tín dụng quốc tế
    define('PAYMENT_METHOD_TYPE_CREDIT_CARD', 2);
//Dịch vụ chuyển khoản online của các ngân hàng
    define('PAYMENT_METHOD_TYPE_INTERNET_BANKING', 3);
//Dịch vụ chuyển khoản ATM
    define('PAYMENT_METHOD_TYPE_ATM_TRANSFER', 4);
//Dịch vụ chuyển khoản truyền thống giữa các ngân hàng
    define('PAYMENT_METHOD_TYPE_BANK_TRANSFER', 5);
function makeSignature($method, $url, $getArgs=array(), $postArgs=array(), $priKeyFile)
	{
		if(strpos($url,'?') !== false)
		{
			list($url,$get) = explode('?', $url);
			parse_str($get, $get);
			$getArgs=array_merge($get, $getArgs);
		}

		ksort($getArgs);
		ksort($postArgs);
		$method=strtoupper($method);
		$data = $method.'&'.urlencode($url).'&'.urlencode(http_build_query($getArgs)).'&'.urlencode(http_build_query($postArgs));
		$priKey = openssl_get_privatekey($priKeyFile);

		openssl_sign($data, $signature, $priKey, OPENSSL_ALGO_SHA1);

		return urlencode(base64_encode($signature));
	}

	$uri = 'http://kiemthu.baokim.vn'; // link test
	//$uri = 'https://www.baokim.vn'; // link thật
?>