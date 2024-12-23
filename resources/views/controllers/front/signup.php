<?php
$data = validation([
    'name'=>'required|string',
    'email'=>'required|email|unique:users,email',
    'mobile'=>'required|unique:users',
    'passowrd'=>'required',
    'user_type'=>'required|in:user',
    
    ],[
    'name'=>trans('users.name'),
    'email'=>trans('users.email'),
    'mobile'=>trans('users.mobile'),
    'passowrd'=>trans('users.passowrd'),
    'user_type'=>trans('users.user_type'),
    ]);
    

$data['passowrd']=bcrypt($data['passowrd']);


if($data['user_type']==='user'){
    db_crete('users',$data);
}


session_forget('old');
//back(); // to back 
redirect(url('users/login'));
