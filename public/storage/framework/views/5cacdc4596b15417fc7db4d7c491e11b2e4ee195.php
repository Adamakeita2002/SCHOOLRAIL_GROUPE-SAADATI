


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $message="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

        <div class="row">

<div class="chat">
  <div class="chat-body">
    <div class="chat-content">
      <div class="chat-messages">
        <div class="container-fluid">


          <?php $__currentLoopData = $tmsgs->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tmsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <p class="text-center">

            <small class="text-secondary">
              <?php 
               $date=Carbon::parse($tmsg->created_at, 'UTC');?>   
                <?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM YYYY')); ?>                     
            </small>
          </p>

          <div class="message-sent">
            <!--<img src="@webRoot/assets/img/john-doe.png">-->
            <p style="background-color: #26bc2c">
              <b><?php echo e($tmsg->title); ?></b><br>
              <?php echo e($tmsg->description); ?>

              <br><small style="color:#fff"><b><i><?php echo e($tmsg->created_at->diffForHumans()); ?></i></b></small>
            </p>
          </div>
          <hr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($tmsgs->count() <=0): ?>

        <p class="text-center">
          <button class="btn btn-danger"> AUCUN MESSAGE RECU </button>
        </p>

        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <br>
  <hr>

<!--
  <div class="chat-footer">

    </div>
-->

</div>



        </div>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/teacher/message.blade.php ENDPATH**/ ?>