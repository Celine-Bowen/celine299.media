<?php $__env->startSection('heading',"Create Thread"); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class=" well">
            <form class="form-vertical" action="<?php echo e(route('thread.store')); ?>" method="post" role="form"
                  id="create-thread-form">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..."
                           value="<?php echo e(old('subject')); ?>">
                </div>

                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tags[]" multiple id="tag">
                        
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input..."
                    > <?php echo e(old('thread')); ?></textarea>
                </div>

                

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>

        $(function () {
            $('#tag').selectize();
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>