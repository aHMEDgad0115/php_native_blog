<?php

if(!function_exists('auth')){
    function auth(){
        if(session_has('admin')){
            return json_decode(session('admin'),true);
        }else{
            return null;
        }
    }
}

if(!function_exists('user_auth')){
    function user_auth(){
        if(session_has('is_user')){
            return json_decode(session('is_user'),true);
        }else{
            return null;
        }
    }
}



if(!function_exists('logout')){
    function logout(){
        session_forget('admin');
    }
}