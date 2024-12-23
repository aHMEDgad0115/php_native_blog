<?php 
$news = db_first('news',"
JOIN categories on news.category_id=categories.id
JOIN users on news.user_id=users.id where news.id='".request('id')."'
",
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
redirect_if(empty($news),url('/'));
//$news = db_paginate('news',"where category_id='{$category["id"]}'");
?>
<?php echo view('front.layout.header',['title'=>$news['title']]); ?>
  
  <div class="row mb-2">
   

  <div class="col-md-12">
  <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?php echo $news['title']; ?></h2>
        <p class="blog-post-meta"><?php echo $news['created_at']; ?> <a href="#"><?php echo $news['username']; ?></a></p>
        <?php 
          if(!empty($news['image'])){
            $img=url('storage/'.$news['image']);
          }else{
            $img=url('assets/images/icon.png');
          }
          
          ?>

        <img src="<?php echo $img; ?>" style="width:100%; max-height:500px; " alt="">
        <hr>
        <p>
          <?php echo $news['content']; ?>
        </p>
 </article>
  </div>
  </div>
<hr><hr>
 <?php echo view('front.categories.comments'); ?>
  <?php echo view('front.layout.footer'); ?>

