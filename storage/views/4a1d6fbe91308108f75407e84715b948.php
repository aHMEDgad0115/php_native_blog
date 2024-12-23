<?php
$data = validation([
    'name'=>'required|string',
    'email'=>'required|email',
    'comment'=>'required',
    
    ],[
    'name'=>trans('main.name'),
    'email'=>trans('main.email'),
    'comment'=>trans('main.comment'),
    ],'api');


