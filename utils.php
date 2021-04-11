<?php

function API_request(string $path, string $method){
    $API_credentials = read_conf("[API]");
    $url = "https://${API_credentials}/${$path}";
    $curl = curl_init();
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
                $conf[] = $line;
            else
                return false;
        }
        return $conf;
    }
    return false;
}