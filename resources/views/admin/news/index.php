<?php
view('admin.layouts.header',['title'=>trans('admin.news')]);
//where news.id=".request('id')
$news_list = db_paginate('news',"JOIN users on news.user_id=users.id
JOIN categories on news.category_id=categories.id
","asc",2,
"news.title,
news.id,
news.image,
news.created_at,
news.updated_at,
news.content,
news.description,
users.name as username,
users.id as user_id,
categories.name as category_name,
categories.id as category_id
");

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.news')}}</h2>
<a class="btn btn-primary" href="{{aurl('news/create')}}">{{trans('admin.create')}}</a>

</div>



      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{trans('news.title')}}</th>
              <th scope="col">{{trans('news.user_id')}}</th>
              <th scope="col">{{trans('news.category_id')}}</th>
              <th scope="col">{{trans('news.image')}}</th>
              <th scope="col">{{trans('admin.created_at')}}</th>
              <th scope="col">{{trans('admin.updated_at')}}</th>
              <th scope="col">{{trans('admin.action')}}</th>
              
            </tr>
          </thead>
          <tbody>
            <?php while($news=mysqli_fetch_assoc($news_list['query'])):?>
            <tr>
              <td>{{$news['id']}}</td>
              <td>{{$news['title']}}</td>
              <td><a href="{{aurl('users/show?id='.$news['user_id'])}}">{{$news['username']}}</a></td>
              <td><a href="{{aurl('categories/show?id='.$news['category_id'])}}">{{$news['category_name']}}</a></td>
              <td> {{image(storage_url($news['image']))}}
              </td>
              <td>{{$news['created_at']}}</td>
              <td>{{$news['updated_at']}}</td>
              
              <td>
                <a href="{{aurl('news/show?id='.$news['id'])}}"><i class="fa-regular fa-eye"></i></a>
                <a href="{{aurl('news/edit?id='.$news['id'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                {{delete_record(aurl('news/delete?id='.$news['id']))}}
              </td>
              
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        </div>
        {{$news_list['render']}}
<?php view('admin.layouts.footer');
