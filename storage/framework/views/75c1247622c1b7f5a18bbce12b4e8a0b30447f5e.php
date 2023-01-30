<?php if(count($errors) > 0 || Session::has('error_message') || isset($error_message)): ?>
    <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <?php if(isset($error_message)): ?> <?php echo e($error_message); ?> <?php endif; ?>
        
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php echo e($error); ?><br/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
        <?php if(Session::has('error_message')): ?> <?php echo e(Session::get('error_message')); ?> <?php endif; ?>
    </div>
<?php endif; ?>

<?php if(Session::has('success_message')): ?> 
    <div class="alert alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <?php echo e(Session::get('success_message')); ?> 
        <?php echo e(Session::forget('success_message')); ?>

    </div>
<?php endif; ?>