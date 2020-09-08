<div class="col-md-3">
    
    <form method="get" action="/thread/search">
        
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Search">
        </div>

    </form>
    

    <a class="btn btn-success form-control"  href="<?php echo e(route('thread.create')); ?>">Create Thread</a> <br><br>
    <h4>Tags</h4>
    <ul class="list-group">
        <a href="<?php echo e(route('thread.index')); ?>" class="list-group-item">
            <span class="badge"></span>
            All Threads
        </a>
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('thread.index',['tags'=>$tag->id])); ?>" class="list-group-item">
            <span class="badge"><?php echo e($tag->user->count); ?></span>
            <?php echo e($tag->name); ?>

    </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
            
            
        
        
            
            
        
    </ul>
</div>