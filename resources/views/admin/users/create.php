<?php
view('admin.layouts.header',['title'=>trans('admin.users')]);
$users = db_paginate('users',"","asc",10);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.users')}}-{{trans('admin.create')}}</h2>
<a class="btn btn-info" href="{{aurl('users')}}">{{trans('admin.users')}}</a>

</div>

<!--
/*
@php
$name=get_error('name');
$email=get_error('email');
$mobile=get_error('mobile');
$passowrd=get_error('passowrd');
$user_type=get_error('user_type');
//end_errors();
@endphp
*/
-->


<form action="{{aurl('users/create')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name">{{trans('users.name')}}</label>
            <input type="text" name="name" value="{{old('name')}}" 
                placeholder="{{trans('users.name')}}"
                class="form-control {{  !empty(get_error('name'))?'is-invalid':''}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="email">{{trans('users.email')}}</label>
            <input type="text" name="email" value="{{old('email')}}" 
                placeholder="{{trans('users.email')}}"
                class="form-control {{ !empty(get_error('email'))?'is-invalid':''}}">
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="form-group">
            <label for="mobile">{{trans('users.mobile')}}</label>
            <input type="text" name="mobile" value="{{old('mobile')}}" 
                placeholder="{{trans('users.mobile')}}"
                class="form-control {{ !empty(get_error('mobile'))?'is-invalid':''}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="passowrd">{{trans('users.passowrd')}}</label>
            <input type="text" name="passowrd" value="{{old('passowrd')}}"
                placeholder="{{trans('users.passowrd')}}"
                class="form-control {{ !empty(get_error('passowrd'))?'is-invalid':''}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="user_type">{{trans('users.user_type')}}</label>
            <select name="user_type" class="form-select {{ !empty(get_error('user_type'))?'is-invalid':''}}">
                <option disabled selected>{{trans('admin.choose')}}</option>
                <option value="user"  {{old('user_type')=='user'?'selected':''}}>{{trans('users.user')}}</option>
                <option value="admin" {{old('user_type')=='admin'?'selected':''}}>{{trans('users.admin')}}</option>
            </select>
            </div>
        </div>



    </div>

    <input type="submit" class="btn btn-success" value="{{trans('admin.create')}}">
</form>

        

<?php view('admin.layouts.footer');
