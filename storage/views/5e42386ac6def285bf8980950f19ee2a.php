<?php
view('admin.layouts.header',['title'=>trans('admin.comments').'-'.trans('admin.show')]);
 
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
<h2><?php echo trans('admin.comments'); ?>-<?php echo trans('admin.show'); ?>#<?php echo request("id") ; ?>-<?php echo $comment['name']; ?></h2>
<a class="btn btn-info" href="<?php echo aurl('comments'); ?>"><?php echo trans('admin.comments'); ?></a>

</div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.name'); ?></label>
            <?php echo $comment['name']; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.email'); ?></label>
            <?php echo $comment['email']; ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.news'); ?></label>
            <?php echo $comment['news_id']; ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.news'); ?></label>
            <?php echo $comment['title']; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.status'); ?></label>
            <?php echo $comment['status']; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('comments.comment'); ?></label>
            <?php echo trans('comments.'.$comment['status']); ?>
            </div>
        </div>
       
        


        
    </div>

        
<?php view('admin.layouts.footer');
