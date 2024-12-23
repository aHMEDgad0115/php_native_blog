<?php
$data = validation([
    'name'=>'required|string',
    'email'=>'required|email|unique:users,email,'.request('id'),
    'mobile'=>'required|unique:users,mobile,'.request('id'),
    'passowrd'=>'required',
    'user_type'=>'required|in:user,admin',
    
    ],[
    'name'=>trans('users.name'),
    'email'=>trans('users.email'),
    'mobile'=>trans('users.mobile'),
    'passowrd'=>trans('users.passowrd'),
    'user_type'=>trans('users.user_type'),
    ]);
    
if(!empty($data['passowrd'])){
    $data['passowrd']=bcrypt($data['passowrd']);    
}else{
    unset($data['passowrd']);
}


db_update('users',$data,request("id"));
session_forget('old');

session("success",trans('admin.updated'));
//back(); // to back to edit category
redirect(aurl('users'));// to back to categories