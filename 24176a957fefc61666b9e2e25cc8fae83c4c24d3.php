<div class="list-group">
    <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        
            
            
                
                
            
        


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="<?php echo e(route('thread.show',$thread->id)); ?>"> <?php echo e($thread->subject); ?></a></h3>
            </div>
            <div class="panel-body">
                <p><?php echo e(str_limit($thread->thread,100)); ?>

                    <br>
                    Posted by <a href="<?php echo e(route('user_profile',$thread->user->name)); ?>"><?php echo e($thread->user->name); ?></a> <?php echo e($thread->created_at->diffForHumans()); ?>

                </p>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h5>No threads</h5>

    <?php endif; ?>
</div>