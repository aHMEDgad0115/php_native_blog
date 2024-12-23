<?php
view('admin.layouts.header',['title'=>trans('admin.users').'-'.trans('admin.edit')]);

$users=db_find('users',request("id"));

redirect_if(empty($users),aurl('users'));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2><?php echo trans('admin.users'); ?>-<?php echo trans('admin.edit'); ?>#<?php echo request("id") ; ?>-<?php echo $users['name']; ?></h2>
<a class="btn btn-info" href="<?php echo aurl('users'); ?>"><?php echo trans('admin.users'); ?></a>

</div>

<form action="<?php echo aurl('users/edit?id='.$users['id']); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name"><?php echo trans('users.name'); ?></label>
            <input type="text" name="name" value="<?php echo $users['name']; ?>" 
                placeholder="<?php echo trans('users.name'); ?>"
                class="form-control <?php echo  !empty(get_error('name'))?'is-invalid':''; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="email"><?php echo trans('users.email'); ?></label>
            <input type="text" name="email" value="<?php echo $users['email']; ?>" 
                placeholder="<?php echo trans('users.email'); ?>"
                class="form-control <?php echo  !empty(get_error('email'))?'is-invalid':''; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="mobile"><?php echo trans('users.mobile'); ?></label>
            <input type="text" name="mobile" value="<?php echo $users['mobile']; ?>" 
                placeholder="<?php echo trans('users.mobile'); ?>"
                class="form-control <?php echo  !empty(get_error('mobile'))?'is-invalid':''; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="passowrd"><?php echo trans('users.passowrd'); ?></label>
            <input type="text" name="passowrd" value="<?php echo $users['passowrd']; ?>" 
                placeholder="<?php echo trans('users.passowrd'); ?>"
                class="form-control <?php echo  !empty(get_error('passowrd'))?'is-invalid':''; ?>">
            </div>
        </div>
        
       
        <div class="col-md-6">
            <div class="form-group">
            <label for="user_type"><?php echo trans('users.user_type'); ?></label>
            <select name="user_type" class="form-select <?php echo  !empty(get_error('user_type'))?'is-invalid':''; ?>">
                <option value="user" <?php echo $users['user_type']=='user'?'selected':''; ?>><?php echo trans('users.user'); ?></option>
                <option value="admin" <?php echo $users['user_type']=='admin'?'selected':''; ?>><?php echo trans('users.admin'); ?></option>
            </select>
            </div>
        </div>


    </div>
    <input type="submit" class="btn btn-success" value="<?php echo trans('admin.save'); ?>">
</form>

        
<?php view('admin.layouts.footer');
