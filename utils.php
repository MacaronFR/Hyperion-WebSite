<?php

function API_request(string $path, string $method): array|false{
    $API_credentials = read_conf("[API]");
    if($path[0] !== '/')
        $path = '/' . $path;
    $url = "https://${API_credentials[0]}${path}";
    $curl = curl_init();
    $opt = [
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_USERPWD => $API_credentials[3] . ":" . $API_credentials[4],
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    ];
    curl_setopt_array($curl, $opt);
    $res = curl_exec($curl);
    if (curl_getinfo($curl)['http_code'] === 200){
        try {
            return json_decode($res, associative: true, flags: JSON_THROW_ON_ERROR);
        }catch (JsonException){
            return false;
        }
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