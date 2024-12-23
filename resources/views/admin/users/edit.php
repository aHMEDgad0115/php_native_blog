<?php
view('admin.layouts.header',['title'=>trans('admin.users').'-'.trans('admin.edit')]);

$users=db_find('users',request("id"));

redirect_if(empty($users),aurl('users'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.users')}}-{{trans('admin.edit')}}#{{request("id") }}-{{$users['name']}}</h2>
<a class="btn btn-info" href="{{aurl('users')}}">{{trans('admin.users')}}</a>

</div>

<form action="{{aurl('users/edit?id='.$users['id'])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name">{{trans('users.name')}}</label>
            <input type="text" name="name" value="{{$users['name']}}" 
                placeholder="{{trans('users.name')}}"
                class="form-control {{ !empty(get_error('name'))?'is-invalid':''}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="email">{{trans('users.email')}}</label>
            <input type="text" name="email" value="{{$users['email']}}" 
                placeholder="{{trans('users.email')}}"
                class="form-control {{ !empty(get_error('email'))?'is-invalid':''}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="mobile">{{trans('users.mobile')}}</label>
            <input type="text" name="mobile" value="{{$users['mobile']}}" 
                placeholder="{{trans('users.mobile')}}"
                class="form-control {{ !empty(get_error('mobile'))?'is-invalid':''}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="passowrd">{{trans('users.passowrd')}}</label>
            <input type="text" name="passowrd" value="{{$users['passowrd']}}" 
                placeholder="{{trans('users.passowrd')}}"
                class="form-control {{ !empty(get_error('passowrd'))?'is-invalid':''}}">
            </div>
        </div>
        
       
        <div class="col-md-6">
            <div class="form-group">
            <label for="user_type">{{trans('users.user_type')}}</label>
            <select name="user_type" class="form-select {{ !empty(get_error('user_type'))?'is-invalid':''}}">
                <option value="user" {{$users['user_type']=='user'?'selected':''}}>{{trans('users.user')}}</option>
                <option value="admin" {{$users['user_type']=='admin'?'selected':''}}>{{trans('users.admin')}}</option>
            </select>
            </div>
        </div>


    </div>
    <input type="submit" class="btn btn-success" value="{{trans('admin.save')}}">
</form>

        
<?php view('admin.layouts.footer');
