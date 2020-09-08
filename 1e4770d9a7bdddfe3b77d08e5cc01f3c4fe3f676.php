<?php $__env->startSection('content'); ?>
    <div class="content-wrap well">
        <h4><?php echo e($thread->subject); ?></h4>
        <hr>

        <div class="thread-details">
            <?php echo \Michelf\Markdown::defaultTransform($thread->thread); ?>

        </div>
        <br>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$thread)): ?>
            <div class="actions">

                <a href="<?php echo e(route('thread.edit',$thread->id)); ?>" class="btn btn-info btn-xs">Edit</a>

                
                <form action="<?php echo e(route('thread.destroy',$thread->id)); ?>" method="POST" class="inline-it">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>

            </div>
        <?php endif; ?>
        
    </div>
    <hr>
    <br>

    

    <?php $__currentLoopData = $thread->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-list well well-lg">
           <?php echo $__env->make('thread.partials.comment-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <hr>

        
        <button class="btn btn-xs btn-default" onclick="toggleReply('<?php echo e($comment->id); ?>')">reply</button>
        <br>
        
        <div style="margin-left: 50px" class="reply-form-<?php echo e($comment->id); ?> hidden">

            <form action="<?php echo e(route('replycomment.store',$comment->id)); ?>" method="post" role="form">
                <?php echo e(csrf_field()); ?>

                <legend>Create Reply</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="" placeholder="Reply...">
                </div>


                <button type="submit" class="btn btn-primary">Reply</button>
            </form>

        </div>
        <br>

        <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('thread.partials.reply-list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br><br>
    <?php echo $__env->make('thread.partials.comment-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

    <script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>