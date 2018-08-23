<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="/">The School</a>
        <?php if(auth()->guard()->check()): ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            
            <ul class="navbar-nav mr-auto ml-5">
                
                <li class="nav-item active">
                    <a class="nav-link" href="/school">School</a>
                </li>

                
                <?php if(auth()->user()->role != 'sales'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                <?php endif; ?>
            </ul>

            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="row nav-user d-flex justify-content-end">
                        <div class="col m-0 text-right p-0">
                            <p class="navbar-text"><?php echo e(auth()->user()->name); ?> | <?php echo e(auth()->user()->role); ?></p>
                        </div>
                        
                        <div class="col col-2 m-0">
                            <img class="mt-1 nav-user-image" src="/storage/images/users/<?php echo e(auth()->user()->image); ?>">
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>