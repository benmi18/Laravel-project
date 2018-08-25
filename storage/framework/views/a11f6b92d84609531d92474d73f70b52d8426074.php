 

<?php $__env->startSection('school-main'); ?>
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'students.create') {
        $edit = true;
    }
?>
<div>
    
    <?php $__env->startSection('title'); ?>
        <h3>
            <?= $edit ? 'Edit '.$student->name : 'Add New Student' ?>
        </h3>
    <?php $__env->stopSection(); ?>
    
    <hr>

    
     
    <?php if($edit && auth()->user()->role != 'sales'): ?> 
        <?php echo Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST']); ?> 
            <?php echo e(method_field('DELETE')); ?> 
            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])); ?>

        <?php echo Form::close(); ?> 
    <?php endif; ?>

    
    
    <?php if($edit): ?>  
        <?php echo Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
            <?php echo e(method_field('PUT')); ?> 
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])); ?>

        
    <?php else: ?> 
        <?php echo Form::open(['action' => ['StudentsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success mb-5'])); ?>

    <?php endif; ?>
    
        <?php echo e(csrf_field()); ?>


        
        <div class="row">
            <div class="col col-7">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $edit ? $student->name : '' ?>" >
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit ? $student->phone : '' ?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $edit ? $student->email : '' ?>" >
                </div>
            </div>

            
            <div class="col col-4">
                <img src="/storage/images/students/<?= $edit ? $student->image : 'student.jpg' ?>" class="mb-2 pre-img" width="100%">
                
                
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="form-group form-check">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox">
                <?php if($edit): ?>
                    <?php $__currentLoopData = $student->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($course->id == $stCourse->id): ?>
                            <input type="checkbox" class="custom-control-input" name="courses[]" value="<?php echo e($course->id); ?>" id="<?php echo e($course->id); ?>" checked>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <input type="checkbox" class="custom-control-input" name="courses[]" value="<?php echo e($course->id); ?>" id="<?php echo e($course->id); ?>" >
                <label class="custom-control-label" for="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php echo Form::close(); ?> 
</div>
<?php echo $__env->make('layouts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>