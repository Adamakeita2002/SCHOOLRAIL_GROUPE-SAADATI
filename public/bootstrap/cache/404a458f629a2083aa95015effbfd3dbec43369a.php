


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          <?php $__currentLoopData = $tltns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="callout <?php if($ltn->type=='MESSAGE'): ?> callout-info <?php endif; ?> " style="<?php if($ltn->state=='read'): ?> background-color:#f50d0d1c; <?php endif; ?>" >
            
              <?php if($ltn->type =='NEWS'): ?><h5><b>Infos School</b>   
               <a href="/teacher/schoolNews#N<?php echo e($ltn->reference); ?>?k=clicked"> (voir l' infos)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
              <?php endif; ?>

              <?php if($ltn->type =='MESSAGE'): ?><h5><b>Message</b>   
               <a href="/teacher/message#M<?php echo e($ltn->reference); ?>?k=clicked"> (voir le message)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
              <?php endif; ?>

              <?php if($ltn->type =='QUIZ'): ?><h5><b>Question</b>   
               <a href="/teacher/quiz?q=<?php echo e($ltn->reference); ?>&k=clicked#Q<?php echo e($ltn->reference); ?>"> (voir la Qs/Rs)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
              <?php endif; ?>

            <p><?php echo e($ltn->label); ?> </p>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/specnotif.blade.php ENDPATH**/ ?>