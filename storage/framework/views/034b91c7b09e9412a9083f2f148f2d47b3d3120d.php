 

<?php $__env->startSection('admin-main'); ?>
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'users.create') {
        $edit = true;
    }
?>
<div>
    
    <?php $__env->startSection('title'); ?>
        <h3>
            <?= $edit ? 'Edit '.$user->name : 'Add New Admin' ?>
        </h3>
    <?php $__env->stopSection(); ?>
    
    <hr>

    
     
    <?php if($edit && $user->id != auth()->user()->id): ?> 
        <?php echo Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST']); ?> 
            <?php echo e(method_field('DELETE')); ?> 
            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])); ?>

        <?php echo Form::close(); ?> 
    <?php endif; ?>

    
    <?php if($edit): ?>  
        <?php echo Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
            <?php echo e(method_field('PUT')); ?> 
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])); ?>

        
    <?php else: ?> 
        <?php echo Form::open(['action' => ['UsersController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success mb-5'])); ?>

    <?php endif; ?>
    
        <?php echo e(csrf_field()); ?>


        
        <div class="row">
            <div class="col col-8">
                <div class="form-group row">
                    
                    <div class="col">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $edit ? $user->name : '' ?>">
                    </div>

                    
                    <div class="col">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" <?php if($edit && $user->role == 'owner' || $edit &&  $user->id == auth()->user()->id): ?> disabled <?php endif; ?>>
                            <option></option>
                            <option value="manager">Manager</option>
                            <option value="sales">Sales</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit ? $user->phone : '' ?>">
                    </div>

                    
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $edit ? $user->email : '' ?>">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="password"><?php echo e(__('Password')); ?></label>
                    
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"> 
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                
                <div class="form-group">
                    <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            
            <div class="col col-4 m-auto">
                <img src="/storage/images/users/<?= $edit ? $user->image : 'user.jpg' ?>" class="mb-2 pre-img" width="100%">
                
                
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?> 
</div>
<?php echo $__env->make('layouts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>