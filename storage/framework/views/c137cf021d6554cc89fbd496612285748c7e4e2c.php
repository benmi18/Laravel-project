<?php $__env->startSection('school-main'); ?>
    <div>
        
        <?php $__env->startSection('title'); ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Admins Count: <?php echo e(count($users)); ?></h5>
                    </div>
                </div>
        <?php $__env->stopSection(); ?>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>