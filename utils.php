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
	$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	if($http_code === 204){
		return ['status' => ['code' => 204, 'message' => "No Content"]];
	}
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

function get_lang(){
	if(!isset($_SESSION['lang'])){
		if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			$accepted = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			preg_match_all("/(([a-z]{1,8})(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]*))?/i", $accepted, $match, PREG_SET_ORDER);
			$languages = [];
			foreach($match as $lang){
				if(isset($languages[$lang[2]], $lang[5])){
					if($languages[$lang[2]] < (double)$lang[5]){
						$languages[$lang[2]] = (double)$lang[5];
					}
				}else{
					if(isset($lang[5])){
						$languages[$lang[2]] = (double)$lang[5];
					}else{
						$languages[$lang[2]] = 1.;
					}
				}
			}
			uasort($languages, function ($a, $b){
				if($a === $b){
					return 0;
				}
				return ($a < $b)? 1 : -1;
			});
			$d = dir(__DIR__ . "/Language");
			$available = [];
			while(($entry = $d->read()) !== false){
				$available[] = $entry;
			}
			$available = array_diff($available, ['.', '..']);
			foreach($languages as $language => $value){
				if(in_array($language, $available)){
					$_SESSION['lang'] = $language;
					return;
				}
			}
		}
		$_SESSION['lang'] = 'fr';
	}
}

function get_text(string $view): array|false{
	if(file_exists(__DIR__ . "/Language/${_SESSION['lang']}/$view.yml")){
		return yaml_parse_file(__DIR__ . "/Language/${_SESSION['lang']}/$view.yml");
	}else{
		return false;
	}
}