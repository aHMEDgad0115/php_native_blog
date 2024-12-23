<?php
$data = validation([
    'news_id'=>'required|integer|exists:news,id',
    'name'=>'required|string',
    'email'=>'required|email',
    'comment'=>'required',
    'status'=>'required|in:show,hide',
    
    ],[
    'name'=>trans('comments.name'),
    'email'=>trans('comments.email'),
    'comment'=>trans('comments.comment'),
    'news_id'=>trans('comments.news'),
    'status'=>trans('comments.status'),
    ],'api');
    
print_r($data);
    
    $comment=db_find('comments',request("id"));
    redirect_if(empty($comment),aurl('comments'));
   


db_update('comments',$data,request("id"));

session_flash('old');
session("success",trans('admin.updated'));
//back(); // to back to edit comment
redirect(aurl('comments/edit?id='.request('id')));// to back to comments
