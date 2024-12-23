<?php
//var_dump(request('id'));

$user=db_find('users',request("id"));

redirect_if(empty($user),aurl('users'));


db_delete('users',request("id"));

session_flash('old');
session("success",trans('admin.deleted'));
redirect(aurl('users'));// to back to users
