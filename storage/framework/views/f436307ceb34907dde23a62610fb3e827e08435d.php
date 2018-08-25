<?php $__env->startSection('admin-main'); ?>
    <div>
        
        <?php $__env->startSection('title'); ?>
        <div class="col col-10">
            <h5><?php echo e($user->role); ?>: <?php echo e($user->name); ?></h5>
        </div>

        
        <div class="col col-2">
            <a href="/users/<?php echo e($user->id); ?>/edit" class="btn btn-primary">Edit</a>
        </div>
        <?php $__env->stopSection(); ?>
        

        <div class="row mb-5">
            
            <div class="col col-4">
                <img src="/storage/images/users/<?php echo e($user->image); ?>" alt="user image" width="100%">
            </div>

            
            <div class="col col-8">
                <p><h3><?php echo e($user->name); ?></h3></p>
                <p>Phone: <?php echo e($user->phone); ?></p>
                <p>Email: <?php echo e($user->email); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>