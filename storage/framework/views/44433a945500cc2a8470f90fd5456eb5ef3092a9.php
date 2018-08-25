 

<?php $__env->startSection('school-main'); ?>
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'courses.create') {
        $edit = true;
    }
?>
    <div>
        
        <?php $__env->startSection('title'); ?>
            <h3>
                <?= $edit ? 'Edit '.$course->name : 'Add New Course' ?>
            </h3>
        <?php $__env->stopSection(); ?>
        
        <hr>

         
        <?php if($edit && auth()->user()->role != 'sales'): ?> 
            <?php echo Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
                <?php echo e(method_field('DELETE')); ?> 
                <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])); ?>

            <?php echo Form::close(); ?> 
        <?php endif; ?>

        
        
        <?php if($edit): ?>  
            <?php echo Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
                <?php echo e(method_field('PUT')); ?> 
                <?php echo e(Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])); ?>

            
        <?php else: ?> 
            <?php echo Form::open(['action' => ['CoursesController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?> 
                <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success mb-5'])); ?>

        <?php endif; ?>

        <?php echo e(csrf_field()); ?>

            
            
            <div class="row">
                <div class="col col-7">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="<?= $edit ? $course->name : '' ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8">
                        <?= $edit ? $course->description : '' ?>
                        </textarea>
                    </div>
                </div>

                
                <div class="col col-4 m-auto">
                    <img src="/storage/images/courses/<?= $edit ? $course->image : 'course.jpg' ?>" class="mb-2 pre-img" width="100%"> 
                    
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($edit): ?>
                <h3><?php echo e(count($course->students)); ?> students taking this course</h3>
            <?php endif; ?>
        </form>
    </div>

    <?php echo $__env->make('layouts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>