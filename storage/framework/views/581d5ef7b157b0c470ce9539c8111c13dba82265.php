<?php $__env->startSection('school-main'); ?>
    <div>
        
        <?php $__env->startSection('title'); ?>
        <div class="col col-10">
            <h5>Student: <?php echo e($student->name); ?></h5>
        </div>

        <div class="col col-2"> 
            <a href="/students/<?php echo e($student->id); ?>/edit" class="btn btn-primary">Edit</a>
        </div>
        <?php $__env->stopSection(); ?>
        

        
        <div class="row mb-5">
            
            <div class="col col-4">
                <img src="/storage/images/students/<?php echo e($student->image); ?>" alt="student image" width="100%">
            </div>
            
            
            <div class="col col-8">
                <p><h3><?php echo e($student->name); ?></h3></p>
                <p><?php echo e($student->phone); ?></p>
                <p><?php echo e($student->email); ?></p>
            </div>
        </div>
        

        
        <div class="row">
            <div class="col col-4">
                <h4 class="mb-3">Couses List</h4>
                <ul class="list-group list-group-flush">
                    <?php $__currentLoopData = $student->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="/courses/<?php echo e($course->id); ?>">
                                <?php echo e($course->name); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>