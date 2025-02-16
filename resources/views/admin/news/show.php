<?php
view('admin.layouts.header',['title'=>trans('admin.news').'-'.trans('admin.show')]);

$news=db_first('news',"JOIN users on news.user_id=users.id
JOIN categories on news.category_id=categories.id
where news.id=".request('id'),
"news.title,
news.id,
news.image,
news.content,
news.description,
users.name as username,
users.id as user_id,
categories.name as category_name,
categories.id as category_id
");

redirect_if(empty($news),aurl('news'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.news')}}-{{trans('admin.show')}}#{{request("id") }}-{{$news['title']}}</h2>
<a class="btn btn-info" href="{{aurl('news')}}">{{trans('admin.news')}}</a>

</div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="title">{{trans('news.title')}}</label>
            {{$news['title']}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="user_id">{{trans('news.user_id')}}</label>
            <a href="{{aurl('users/show?id='.$news['user_id'])}}">{{$news['username']}}</a>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="category_id">{{trans('news.category_id')}}</label>
             <td><a href="{{aurl('categories/show?id='.$news['category_id'])}}">{{$news['category_name']}}</a></td>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="image">{{trans('news.image')}}</label>
            {{image(storage_url($news['image']))}}
           
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="description">{{trans('news.description')}}</label>
            {{$news['description']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="content">{{trans('news.content')}}</label>
            {{$news['content']}}
            </div>
        </div>
    </div>

        
<?php view('admin.layouts.footer');
