<h4><?php echo e($comment->body); ?> </h4>



<?php if(!empty($thread->solution)): ?>
    <?php if($thread->solution == $comment->id): ?>
        <button class="btn btn-success pull-right">Solution</button>
    <?php endif; ?>

<?php else: ?>
    
        
            
            
                
                
                
                
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$thread)): ?>
            <div  class="btn btn-success pull-right" onclick="markAsSolution('<?php echo e($thread->id); ?>','<?php echo e($comment->id); ?>',this)">Mark as solution</div>
            <?php endif; ?>
        
    


<?php endif; ?>
<lead><?php echo e($comment->user->name); ?></lead>

<div class="actions">

    <button class="btn btn-default btn-xs" id="<?php echo e($comment->id); ?>-count" ><?php echo e($comment->likes()->count()); ?></button>
    <span  class="btn btn-default btn-xs  <?php echo e($comment->isLiked()?"liked":""); ?>" onclick="likeIt('<?php echo e($comment->id); ?>',this)"><span class="glyphicon glyphicon-heart"></span></span>
    
    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#<?php echo e($comment->id); ?>">edit</a>
    <div class="modal fade" id="<?php echo e($comment->id); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">

                        <form action="<?php echo e(route('comment.update',$comment->id)); ?>" method="post" role="form">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('put')); ?>

                            <legend>Edit comment</legend>

                            <div class="form-group">
                                <input type="text" class="form-control" name="body" id=""
                                       placeholder="Input..." value="<?php echo e($comment->body); ?>">
                            </div>


                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    
    <form action="<?php echo e(route('comment.destroy',$comment->id)); ?>" method="POST" class="inline-it">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

        <input class="btn btn-xs btn-danger" type="submit" value="Delete">
    </form>

</div>

<?php $__env->startSection('js'); ?>
    <script>
        function markAsSolution(threadId, solutionId,elem) {
            var csrfToken='<?php echo e(csrf_token()); ?>';
            $.post('<?php echo e(route('markAsSolution')); ?>', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
                $(elem).text('Solution');
            });
        }

        function likeIt(commentId,elem){
            var csrfToken='<?php echo e(csrf_token()); ?>';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('<?php echo e(route('toggleLike')); ?>', {commentId: commentId,_token:csrfToken}, function (data) {
                console.log(data);
               if(data.message==='liked'){
                   $(elem).addClass('liked');
                   $('#'+commentId+"-count").text(likesCount+1);
//                   $(elem).css({color:'red'});
               }else{
//                   $(elem).css({color:'black'});
                   $('#'+commentId+"-count").text(likesCount-1);
                   $(elem).removeClass('liked');
               }
            });

        }


    </script>

<?php $__env->stopSection(); ?>