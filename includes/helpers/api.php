<?php

if(!function_exists('response')){
    function response(array|null $data ,int $status = 200){
        
        http_response_code($status);
        header('Content-Type:application/json; charset=utf-8');
        if(!empty($data)){
           return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        
    }
}