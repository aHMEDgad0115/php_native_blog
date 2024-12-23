<?php
view('admin.layouts.header',['title'=>trans('admin.users').'-'.trans('admin.show')]);

$users=db_find('users',request("id"));

redirect_if(empty($users),aurl('users'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.users')}}-{{trans('admin.show')}}#{{request("id") }}-{{$users['name']}}</h2>
<a class="btn btn-info" href="{{aurl('users')}}">{{trans('admin.users')}}</a>

</div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name">{{trans('users.name')}}</label>
            {{$users['name']}}
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
            <label >{{trans('users.email')}}</label>
            {{$users['email']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label >{{trans('users.mobile')}}</label>
            {{$users['mobile']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label >{{trans('users.user_type')}}</label>
            {{trans('users.'.$users['user_type'])}}
            </div>
        </div>


    </div>

        
</main>
<?php view('admin.layouts.footer');
