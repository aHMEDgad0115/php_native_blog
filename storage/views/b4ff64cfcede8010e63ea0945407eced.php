<?php


$data = validation([
    'title'=>'required|string',
    'category_id'=>'required',
    'image'=>'image',
    'description'=>'',
    'content'=>'required',
    
    ],[
    'title'=>trans('news.title'),
    'category_id'=>trans('news.category_id'),
    'image'=>trans('news.image'),
    'description'=>trans('news.description'),
    'content'=>trans('news.content'),
    ]);
    

$file_info=file_ext($data['image']) ;
if(!empty($data['image']['tmp_name'])){
    $data['image']=store_file($data['image'],'news/'.$file_info['hash_name']);
}else{
    unset( $data['image']);
}
$data['user_id']=auth()['id'];

//var_dump($data);
db_crete('news',$data);

session_flash('old');
session("success",trans('admin.added'));
//back(); // to back to add news
redirect(aurl('news'));// to back to categories