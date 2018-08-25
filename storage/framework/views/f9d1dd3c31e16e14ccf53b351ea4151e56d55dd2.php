<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        
        <div class="col col-3 ">
            <?php echo $__env->make('layouts.admin-left-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        
        <div class="col col-5 ml-auto mr-auto">
            
            <div class="row mb-3 alert alert-secondary">
                <?php echo $__env->yieldContent('title'); ?>
            </div>
            
            <?php echo $__env->yieldContent('admin-main'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>