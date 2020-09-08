<?php $__env->startSection('category'); ?>
    <div class="col-md-3" >
    <div class="dp">
    <img src="https://dummyimage.com/300x200/000/fff" alt="">
    </div>
        <h3>
            <?php echo e($user->name); ?>

        </h3>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
    
    <h3><?php echo e($user->name); ?>'s latest Threads</h3>

    <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <h5><?php echo e($thread->subject); ?></h5>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h5>No threads yet</h5>

    <?php endif; ?>
    <br>
    <hr>

    <h3><?php echo e($user->name); ?>'s latest Comments</h3>

    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <h5><?php echo e($user->name); ?> commented on <a href="<?php echo e(route('thread.show',$comment->commentable->id)); ?>"><?php echo e($comment->commentable->subject); ?></a>  <?php echo e($comment->created_at->diffForHumans()); ?></h5>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <h5>No comments yet</h5>
    <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>