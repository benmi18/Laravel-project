
<div class="row mb-3">
    <div class="col col-9">
        <h4>Admins</h4>
    </div>
    <div class="col col-3 w-5">
        <a href="/users/create">
            <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
        </a>
    </div>
</div>


<ul class="list-group list-container">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(auth()->user()->role == 'manager' && $user->role == 'owner'): ?>
            <?php continue; ?>
        <?php endif; ?>

        
        <a href="/users/<?php echo e($user->id); ?>">
            <li class="list-group-item mb-2">
                <div class="row">
                    
                    <div class="col col-4">
                        <img src="/storage/images/users/<?php echo e($user->image); ?>" alt="" class="display-img">
                    </div>
                    
                    
                    <div class="col col-8">
                        <p>Name: <?php echo e($user->name); ?></p>
                        <p>Role: <?php echo e($user->role); ?></p>
                    </div>
                </div>
            </li>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>