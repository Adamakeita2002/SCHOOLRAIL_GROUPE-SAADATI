


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Notifications</li>
            <li class="breadcrumb-item active" aria-current="page">
            <?php if($q =='RESSOURCE'): ?> Ressource 
            <?php elseif($q =='MARK'): ?> Note 
            <?php elseif($q =='BDE'): ?>  BDE
            <?php elseif($q =='CALENDAR'): ?> Calendrier
            <?php elseif($q =='NEWS'): ?> Actualités
            <?php elseif($q =='TEST'): ?> Test (Exercice)
            <?php elseif($q =='FORUM'): ?> Forum
            <?php endif; ?>
          </li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->


          <?php $__currentLoopData = $ltns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="callout 
          <?php if($ltn->type =='RESSOURCE'): ?> callout-info 
          <?php elseif($ltn->type =='MARK'): ?> callout-warning 
          <?php elseif($ltn->type =='BDE'): ?>  callout-danger
          <?php elseif($ltn->type =='CALENDAR'): ?> callout-success
          <?php elseif($ltn->type =='NEWS'): ?>
          <?php elseif($ltn->type =='TEST'): ?>callout-test
          <?php elseif($ltn->type =='FORUM'): ?>callout-forum
          <?php elseif($ltn->type =='MESSAGE'): ?>callout-info
          <?php endif; ?>" style="<?php if($ltn->state=='read'): ?> background-color:#f50d0d1c; <?php endif; ?>" >
          
          <?php if($ltn->type =='RESSOURCE'): ?><h5><b>Ressource</b>  
         <?php $ressource=$ressources->where('id',$ltn->reference)->first(); ?> 

           <a href="/student/<?php if(!is_null($ressource->teacher_id)){echo 'materiel';}else{echo 'standard';}?>?q=<?php echo e($ltn->reference); ?>&k=clicked#R<?php echo e($ltn->reference); ?>"> (voir la ressource)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='MARK'): ?><h5><b>Note</b>  <a href="/student/mark?k=clicked"> (voir les notes)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='BDE'): ?><h5><b>Bureau des Etudiants</b>   
           <a href="/student/schoolBde#B<?php echo e($ltn->reference); ?>?k=clicked"> (voir l'actu BDE)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='CALENDAR'): ?><h5><b>Calendrier</b>   
           <a href="/student/calendar#C<?php echo e($ltn->reference); ?>?k=clicked"> (voir le calendrier)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='NEWS'): ?><h5><b>Infos School</b>   
           <a href="/student/schoolNews#N<?php echo e($ltn->reference); ?>?k=clicked"> (voir l' infos)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='TEST'): ?><h5><b>Exercice (Test)</b>   
           <a href="/student/homework#H<?php echo e($ltn->reference); ?>?k=clicked"> (voir l'Exercice (Test))</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='FORUM'): ?><h5><b>Forum</b>   
           <a href="/student/forum?q=<?php echo e($ltn->reference); ?>&k=clicked#F<?php echo e($ltn->reference); ?>"> (voir le sujet)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='QUIZ'): ?><h5><b>Question</b>   
           <a href="/student/quiz?q=<?php echo e($ltn->reference); ?>&k=clicked#Q<?php echo e($ltn->reference); ?>"> (voir la Qs/Rs)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <?php if($ltn->type =='MESSAGE'): ?><h5><b>Message</b>   
           <a href="/student/message?q=<?php echo e($ltn->reference); ?>&k=clicked#F<?php echo e($ltn->reference); ?>"> (voir le message)</a><span class="pull-right" style="font-size: 12px"> <b><i><?php echo e($ltn->created_at->diffForHumans()); ?></i></b> </span></h5>
          <?php endif; ?>

          <p><?php echo e($ltn->label); ?> </p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/student/specnotif.blade.php ENDPATH**/ ?>