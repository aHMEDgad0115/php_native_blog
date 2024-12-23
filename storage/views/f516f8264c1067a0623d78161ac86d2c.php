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
<h2><?php echo trans('admin.news'); ?>-<?php echo trans('admin.show'); ?>#<?php echo request("id") ; ?>-<?php echo $news['title']; ?></h2>
<a class="btn btn-info" href="<?php echo aurl('news'); ?>"><?php echo trans('admin.news'); ?></a>

</div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="title"><?php echo trans('news.title'); ?></label>
            <?php echo $news['title']; ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="user_id"><?php echo trans('news.user_id'); ?></label>
            <a href="<?php echo aurl('users/show?id='.$news['user_id']); ?>"><?php echo $news['username']; ?></a>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="category_id"><?php echo trans('news.category_id'); ?></label>
             <td><a href="<?php echo aurl('categories/show?id='.$news['category_id']); ?>"><?php echo $news['category_name']; ?></a></td>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="image"><?php echo trans('news.image'); ?></label>
            <?php echo image(storage_url($news['image'])); ?>
           
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="description"><?php echo trans('news.description'); ?></label>
            <?php echo $news['description']; ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="content"><?php echo trans('news.content'); ?></label>
            <?php echo $news['content']; ?>
            </div>
        </div>
    </div>

        
<?php view('admin.layouts.footer');
