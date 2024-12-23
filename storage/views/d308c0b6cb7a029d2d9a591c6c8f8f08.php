<?php

$comment=db_find('comments',request("id"));

redirect_if(empty($comment),aurl('comments'));

db_delete('comments',request("id"));

//session_flash('old');
session("success",trans('admin.deleted'));
redirect(aurl('comments'));// to back to comments
