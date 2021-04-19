<?php

function API_request(string $path, string $method, array $param = null): array|false{
	$API_credentials = read_conf("[API]");
	if($path[0] !== '/')
		$path = '/' . $path;
	$url = "https://${API_credentials[0]}$path";
	$curl = curl_init();
	$opt = [
		CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_CUSTOMREQUEST => $method,
		CURLOPT_USERPWD => $API_credentials[3] . ":" . $API_credentials[4],
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	];
	if($param !== null && ($method === "POST" || $method === "PUT")){
		try{
			$json = json_encode($param, true, JSON_THROW_ON_ERROR);
		}catch(JsonException){
			return false;
		}
		$opt[CURLOPT_POSTFIELDS] = $json;
		$opt[CURLOPT_HTTPHEADER] = ['Content-type: application/json'];
	}
	curl_setopt_array($curl, $opt);
	$res = curl_exec($curl);
	try{
		return json_decode($res, associative: true, flags: JSON_THROW_ON_ERROR);
	}catch(JsonException){
		return false;
	}
}

function read_conf(string $section): array|false{
	if($section[0] === '[' && $section[strlen($section) - 1] === ']'){
		$file = fopen(__DIR__ . "/conf", "rb");
		while(substr($line = fgets($file), 0, strlen($line) - 1) !== $section){
			if($line === false)
				return false;
		}
		$conf = [];
		while(substr($line = fgets($file), 0, strlen($line) - 1) !== ""){
			if($line !== false)
				$conf[] = substr($line, 0, strlen($line) - 1);
			else
				return false;
		}
		return $conf;
	}
	return false;
}

function sanitize(string $string): string{
	$string = trim($string);
	$string = htmlspecialchars($string);
	return $string;
}