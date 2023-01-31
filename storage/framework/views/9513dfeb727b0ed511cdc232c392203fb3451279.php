<div class="likeunlike">
    
    <div class="likeunlike_in" id="likeunlikeid<?php echo e($gid); ?>">
    
        <?php echo $__env->make('elements.likeunlikeinner', ['gid'=>$gid], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>


