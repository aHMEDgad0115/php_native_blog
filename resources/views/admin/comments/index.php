<?php
view('admin.layouts.header',['title'=>trans('admin.comments')]);

$comments = db_paginate('comments',"JOIN news on comments.news_id=news.id","desc",10,
"comments.name,
comments.email,
comments.status,
comments.comment,
comments.id,
comments.news_id,
news.title as title");

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.comments')}}</h2>

</div>



      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{trans('comments.name')}}</th>
              <th scope="col">{{trans('comments.news')}}</th>
              <th scope="col">{{trans('comments.email')}}</th>
              <th scope="col">{{trans('comments.comment')}}</th>
              <th scope="col">{{trans('comments.status')}}</th>
              <th scope="col">{{trans('admin.action')}}</th>
              
            </tr>
          </thead>
          <tbody>
            <?php while($comment=mysqli_fetch_assoc($comments['query'])):?>
            <tr>
              <td>{{ $comment['id'] }}</td>
              <td>{{ $comment['name'] }}</td>
              <td>{{ $comment['title'] }}</td>
              <td>{{ $comment['email'] }}</td>
              <td>{{ $comment['comment'] }}</td>
              <td>{{ trans('comments.'.$comment['status']) }}</td>
              <td>
                <a href="{{aurl('comments/show?id='.$comment['id'])}}"><i class="fa-regular fa-eye"></i></a>
                <a href="{{aurl('comments/edit?id='.$comment['id'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                {{delete_record(aurl('comments/delete?id='.$comment['id']))}}
              </td>
              
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        </div>
        {{$comments['render']}}
<?php view('admin.layouts.footer');
