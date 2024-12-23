<?php

if(!function_exists('bcrypt')){
    function bcrypt(string $passowrd):string{
       
        return password_hash($passowrd,PASSWORD_BCRYPT);
    }
}


if(!function_exists('hash_check')){
    function hash_check(string $passowrd ,string $hash):string{
        return password_verify($passowrd,$hash);
    }
}