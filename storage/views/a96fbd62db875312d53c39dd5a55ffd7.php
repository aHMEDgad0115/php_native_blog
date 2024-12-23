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

if(empty($login)||!empty($login)&&(!hash_check($data['passowrd'],$login['passowrd']))||$login['user_type']!='user'){
    session('error_login',trans('admin.login_failed'));
    redirect('users/login');
}else{
    session('is_user',json_encode($login));
    redirect('users/profile');
}
//var_dump($login);