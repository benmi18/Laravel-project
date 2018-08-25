<div class="row">
    
    <div class="col col-6">
        
        <div class="row mb-3">
            <div class="col col-9">
                <h4>Courses</h4>
            </div>

            
            <?php if(auth()->user()->role != 'sales'): ?>
                <div class="col col-3">
                    <a href="/courses/create">
                        <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        
        <ul class="list-group list-container">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/courses/<?php echo e($course->id); ?>">
                    <li class="list-group-item mb-2">
                        <div class="row">
                            <div class="col col-4">
                                <img src="/storage/images/courses/<?php echo e($course->image); ?>" alt="" width="100%">
                            </div>
                            <div class="col col-8">
                                <p>Name: <?php echo e($course->name); ?></p>
                            </div>
                        </div>
                    </li>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    

    
    <div class="col col-6">
        
        <div class="row mb-3">
            <div class="col col-9">
                <h4>Students</h4>
            </div>
            <?php if(auth()->user()->role != 'sales'): ?>
                <div class="col col-3">
                    <a href="/students/create">
                        <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        
        <ul class="list-group list-container">
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/students/<?php echo e($student->id); ?>">
                    <li class="list-group-item mb-2">
                        <div class="row">
                            
                            <div class="col col-4">
                                <img src="/storage/images/students/<?php echo e($student->image); ?>" alt="" width="100%">
                            </div>
                            
                            
                            <div class="col col-8">
                                <p>Name: <?php echo e($student->name); ?></p>
                                <p>Phone: <?php echo e($student->phone); ?></p>
                            </div>
                        </div>
                    </li>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    
</div>