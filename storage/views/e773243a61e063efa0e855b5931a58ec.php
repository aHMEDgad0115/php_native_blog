<?php
$data = validation([
    'name'=>'required|string',
    'email'=>'required|email|unique:users,email',
    'mobile'=>'required|unique:users',
    'passowrd'=>'required',
    'user_type'=>'required|in:user,admin',
    
    ],[
    'name'=>trans('users.name'),
    'email'=>trans('users.email'),
    'mobile'=>trans('users.mobile'),
    'passowrd'=>trans('users.passowrd'),
    'user_type'=>trans('users.user_type'),
    ]);
    

$data['passowrd']=bcrypt($data['passowrd']);
//var_dump($data);

db_crete('users',$data);

session_forget('old');

session("success",trans('admin.added'));
//back(); // to back to add category
redirect(aurl('users'));// to back to categories/