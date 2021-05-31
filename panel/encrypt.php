<?php

$adminID = 'admin';
$adminPW = '123456';
function AesEncrypt($enstr)
{
	return trim(openssl_encrypt($enstr, 'AES256', 'sdlksnkwenorknelkznsldsl13szdwlekrnslkdjfalksdjflksdjfkjdfksjdkfjsdkfjkqwenroasd', 0, '4023565890123404'));
}

function AesDecrypt($destr)
{
	return trim(openssl_decrypt($destr, 'AES256', 'sdlksnkwenorknelkznsldsl13szdwlekrnslkdjfalksdjflksdjfkjdfksjdkfjsdkfjkqwenroasd', 0, '4023565890123404'));
}

function XorString($str)
{
	$key = 'l';
	$outText = '';
	for($i = 0; $i < strlen($str); $i++)
		$outText .= ($str[$i] ^ $key);
	
	return $outText;
}
?>