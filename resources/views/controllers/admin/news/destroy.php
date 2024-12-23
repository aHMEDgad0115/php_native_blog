<?php
var_dump(request('id'));

$news=db_find('news',request("id"));

redirect_if(empty($news),aurl('news'));
if(!empty($news['image'])){
    delete_file($news['image']);
}

db_delete('news',request("id"));

session_flash('old');
session("success",trans('admin.deleted'));
redirect(aurl('news'));// to back to news
