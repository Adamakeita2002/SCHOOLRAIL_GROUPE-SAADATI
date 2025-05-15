<?php if(count($errors)): ?>

<div class="alert alert-danger">

   <ul>

     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li><?php echo e($error); ?></li>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   </ul>
  
</div>

<?php endif; ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/layouts/errors.blade.php ENDPATH**/ ?>