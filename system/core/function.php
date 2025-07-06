<?php
function xss($data)
{
	$data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
	do {
		$old_data = $data;
		$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	} while ($old_data !== $data);
	return $data;
}

function valid_str_data($data)
{
	if (preg_match('/^\w{6,32}$/', $data)) {
		return true;
	} else {
		return false;
	}
}

function enPassword($password)
{
	return password_hash($password, PASSWORD_DEFAULT);
}

function dePassword($password, $passwordEn)
{
	return password_verify($password, $passwordEn);
}

function randStr($length, $text = "abcdefghijklmnopqrstuvwxyz0123456789")
{
	return substr(str_shuffle(str_repeat($x = $text, ceil($length / strlen($x)))), 1, $length);
}

function random($string, $length)
{
	$chars = $string;
	$data = substr(str_shuffle($chars), 0, $length);
	return $data;
}

function href($url = null)
{
	return header("Location: " . $url);
}

function log_text($file, $txt)
{
	$myfile = fopen($file, "a");
	fwrite($myfile, $txt);
	fclose($myfile);
}

function ip_address()
{
	$ip = $_SERVER['REMOTE_ADDR'];
	if (!empty($_SERVER['WWW_HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['WWW_HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['WWW_HTTP_X_FORWARDED_FOR'])) {
		$ip =
			$_SERVER['WWW_HTTP_X-FORWARDED_FOR'];
	}
	return $ip;
}

function auto($url)
{
	$curl = curl_init();
	$headers = array();
	$headers[] = 'Content-Type: application/json; charset=utf-8';
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	$ch = curl_exec($curl);
	curl_close($curl);
	return $ch;
}
