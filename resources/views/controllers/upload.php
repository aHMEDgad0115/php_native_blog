<?php

//store_file(request('image'),'images/new/img.jpg');


$data = validation([
'email'=>'required|email',
'mobile'=>'required|numeric',
'address'=>'required|string',
],[
'email'=>trans('main.email'),
'mobile'=>trans('main.mobile'),
'address'=>trans('main.address'),
]);

var_dump($data);

session_flash('old');