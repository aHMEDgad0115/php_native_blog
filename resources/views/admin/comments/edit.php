<?php
view('admin.layouts.header',['title'=>trans('admin.comments').'-'.trans('admin.edit')]);
 
$comment=db_first('comments',"JOIN news on comments.news_id=news.id
where comments.id=".request('id'),
"comments.id,
comments.name,
comments.email,
comments.status,
comments.comment,
comments.news_id,
news.title as title");

redirect_if(empty($comment),aurl('comments'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>{{trans('admin.comments')}}-{{trans('admin.edit')}}#{{request("id") }}-{{$comment['name']}}</h2>
<a class="btn btn-info" href="{{aurl('comments')}}">{{trans('admin.comments')}}</a>

</div>



<form action="{{aurl('comments/edit?id='.$comment['id'])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <input type="hidden" name="news_id" value="{{$comment['news_id']}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name">{{trans('comments.name')}}</label>
            <input type="text" name="name" value="{{$comment['name']}}" 
                placeholder="{{trans('comments.name')}}"
                class="form-control {{ !empty($name)?'is-invalid':''}}">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
            <label for="email">{{trans('comments.email')}}</label>
            <input type="text" name="email" value="{{$comment['email']}}" 
                placeholder="{{trans('comments.email')}}"
                class="form-control {{ !empty($email)?'is-invalid':''}}">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
            <label for="news">{{trans('comments.news')}}</label>
            <a class="form-control " target="_blank" disabled href="{{aurl('news/show?id='.$comment['news_id'])}}">{{$comment['title']}}</a>
            </div>
        </div>


        
        <div class="col-md-6">
            <div class="form-group">
            <label for="status">{{trans('comments.status')}}</label>
            <select name="status"  class="form-control {{ !empty($status)?'is-invalid':''}}">
                <option value="show" {{$comment['status']=='show'?'selected':''}}>{{trans('comments.show')}}</option>
                <option value="hide" {{$comment['status']=='hide'?'selected':''}}>{{trans('comments.hide')}}</option>
            </select>
            </div>
        </div>

       

        <div class="col-md-12">
            <div class="form-group">
            <label for="comment">{{trans('comments.comment')}}</label>
            <textarea name="comment" placeholder="{{trans('comments.comment')}}"
            class="form-control {{ !empty($comment)?'is-invalid':''}}">{{$comment['comment']}}</textarea>
            
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="{{trans('admin.save')}}">
</form>

        
<?php view('admin.layouts.footer');
