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
<h2><?php echo trans('admin.news'); ?></h2>
<a class="btn btn-primary" href="<?php echo aurl('news/create'); ?>"><?php echo trans('admin.create'); ?></a>

</div>



      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"><?php echo trans('news.title'); ?></th>
              <th scope="col"><?php echo trans('news.user_id'); ?></th>
              <th scope="col"><?php echo trans('news.category_id'); ?></th>
              <th scope="col"><?php echo trans('news.image'); ?></th>
              <th scope="col"><?php echo trans('admin.created_at'); ?></th>
              <th scope="col"><?php echo trans('admin.updated_at'); ?></th>
              <th scope="col"><?php echo trans('admin.action'); ?></th>
              
            </tr>
          </thead>
          <tbody>
            <?php while($news=mysqli_fetch_assoc($news_list['query'])):?>
            <tr>
              <td><?php echo $news['id']; ?></td>
              <td><?php echo $news['title']; ?></td>
              <td><a href="<?php echo aurl('users/show?id='.$news['user_id']); ?>"><?php echo $news['username']; ?></a></td>
              <td><a href="<?php echo aurl('categories/show?id='.$news['category_id']); ?>"><?php echo $news['category_name']; ?></a></td>
              <td> <?php echo image(storage_url($news['image'])); ?>
              </td>
              <td><?php echo $news['created_at']; ?></td>
              <td><?php echo $news['updated_at']; ?></td>
              
              <td>
                <a href="<?php echo aurl('news/show?id='.$news['id']); ?>"><i class="fa-regular fa-eye"></i></a>
                <a href="<?php echo aurl('news/edit?id='.$news['id']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <?php echo delete_record(aurl('news/delete?id='.$news['id'])); ?>
              </td>
              
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        </div>
        <?php echo $news_list['render']; ?>
<?php view('admin.layouts.footer');
