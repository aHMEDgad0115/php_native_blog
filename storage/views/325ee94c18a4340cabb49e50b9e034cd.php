<?php

$data = validation([
'email'=>'required|email',
'passowrd'=>'required',
'remember_me'=>'',

],[
'email'=>trans('admin.email'),
'passowrd'=>trans('admin.passowrd'),
]);

$login = db_first('users',"where email LIKE '%".$data['email']."%'");

if(empty($login)||!empty($login)&&(!hash_check($data['passowrd'],$login['passowrd']))||$login['user_type']!='admin'){
    session('error_login',trans('admin.login_failed'));
    redirect(ADMIN.'/login');
}else{
    session('admin',json_encode($login));
    redirect(ADMIN);
}
//var_dump($login);