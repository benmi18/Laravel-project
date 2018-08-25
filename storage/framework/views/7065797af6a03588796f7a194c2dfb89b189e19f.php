<?php $__env->startSection('school-main'); ?>
    <div>
        <?php $__env->startSection('title'); ?>
            <div class="col col-10">
                <h5>Cource: <?php echo e($course->name); ?></h5>
            </div>

            <?php if(auth()->user()->role != 'sales'): ?>
                <div class="col col-2">
                    <a href="/courses/<?php echo e($course->id); ?>/edit" class="btn btn-primary">Edit</a>
                </div>
            <?php endif; ?>
        <?php $__env->stopSection(); ?>

        <div class="row mb-5">
            <div class="col col-4">
                <img src="/storage/images/courses/<?php echo e($course->image); ?>" alt="student image" width="100%">
            </div>

            <div class="col col-8">
                <h3><?php echo e($course->name); ?>, <?php echo e(count($course->students)); ?> Students</h3>
                <p><?php echo e($course->description); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <h4 class="mb-3">Students List</h4>
                <ul class="list-group list-group-flush">
                    <?php $__currentLoopData = $course->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="/students/<?php echo e($student->id); ?>">
                                <?php echo e($student->name); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>