<div class="comment-form">

    <form action="<?php echo e(route('threadcomment.store',$thread->id)); ?>" method="post" role="form">
        <?php echo e(csrf_field()); ?>

        <legend>Create comment</legend>

        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Input...">
        </div>


        <button type="submit" class="btn btn-primary">Comment</button>
    </form>

</div>