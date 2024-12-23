<?php
view('admin.layouts.header',['title'=>trans('admin.users').'-'.trans('admin.show')]);

$users=db_find('users',request("id"));

redirect_if(empty($users),aurl('users'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2><?php echo trans('admin.users'); ?>-<?php echo trans('admin.show'); ?>#<?php echo request("id") ; ?>-<?php echo $users['name']; ?></h2>
<a class="btn btn-info" href="<?php echo aurl('users'); ?>"><?php echo trans('admin.users'); ?></a>

</div>



    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('users.name'); ?></label>
            <?php echo $users['name']; ?>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
            <label ><?php echo trans('users.email'); ?></label>
            <?php echo $users['email']; ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label ><?php echo trans('users.mobile'); ?></label>
            <?php echo $users['mobile']; ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label ><?php echo trans('users.user_type'); ?></label>
            <?php echo trans('users.'.$users['user_type']); ?>
            </div>
        </div>


    </div>

        
</main>
<?php view('admin.layouts.footer');
