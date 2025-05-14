


<?php $__env->startSection('content'); ?>
  <?php use Carbon\Carbon;?>
  <?php $message="activve" ;?>
<!-- CHECK BOX HANDLER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
<!--END CHECK BOX HANDLER -->

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarM', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarM', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Message</li>
            <li class="breadcrumb-item active" aria-current="page">Aux étudiants</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

      <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xmsg.png" alt="Card image" style="width:260px; padding-top: 20px">
      <br>

      <?php if(session('status1')): ?>
          <div align="center">
              <div class="alert alert-success text-center">
               <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
              </div>
          </div>
      <?php endif; ?>

      <?php if(session('status2')): ?>
          <div align="center">
              <div class="alert alert-success text-center">
               <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
              </div>
          </div>
      <?php endif; ?>
      <?php if(session('status3')): ?>
          <div align="center">
              <div class="alert alert-success text-center">
               <b><i class="icon-info"></i> <?php echo e(session('status3')); ?><br></b>
              </div>
          </div>
      <?php endif; ?>

      <div class="row">

        <div class="col-md-12">

            <form  action="/manager/CreateSmsg" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              <div class="row">
                <div class="col-sm-6">
                <label><b>SELECTIONNER LES CLASSES</b></label><br>

                <?php if($classrooms1->count() >= 1): ?>
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>1ère Année</b></p>
                <?php endif; ?>
                  <div class="row">
                  <?php $__currentLoopData = $classrooms1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox1 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" class="check1" id="<?php echo e($classroom->id); ?>" value="<?php echo e($classroom->id); ?>"/>
                          <span class="check-mark"></span><?php echo e($classroom->name); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($classrooms1->count() >= 1): ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox2 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" class="check1" id="checkAll1">
                          <span class="check-mark"></span><b>Cocher tout</b>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>


                <?php if($classrooms2->count() >= 1): ?>
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>2ème Année</b></p>
                <?php endif; ?>
                  <div class="row">
                  <?php $__currentLoopData = $classrooms2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox2 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" class="check2" id="<?php echo e($classroom->id); ?>" value="<?php echo e($classroom->id); ?>"/>
                          <span class="check-mark"></span><?php echo e($classroom->name); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($classrooms2->count() >= 1): ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox2 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" class="check2" id="checkAll2">
                          <span class="check-mark"></span><b>Cocher tout</b>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
                <?php if($classrooms3->count() >= 1): ?>
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Licence</b></p>
                <?php endif; ?>
                  <div class="row">
                  <?php $__currentLoopData = $classrooms3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox3 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" class="check3" id="<?php echo e($classroom->id); ?>" value="<?php echo e($classroom->id); ?>"/>
                          <span class="check-mark"></span><?php echo e($classroom->name); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($classrooms3->count() >= 1): ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox3 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" class="check3" id="checkAll3">
                          <span class="check-mark"></span><b>Cocher tout</b>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                 </div>
                <?php if($classrooms4->count() >= 1): ?>
                <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master I</b></p>
                <?php endif; ?>
                <div class="row">
                  <?php $__currentLoopData = $classrooms4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox4 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" class="check4" id="<?php echo e($classroom->id); ?>" value="<?php echo e($classroom->id); ?>"/>
                          <span class="check-mark"></span><?php echo e($classroom->name); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($classrooms4->count() >= 1): ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox4 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" class="check4" id="checkAll4">
                          <span class="check-mark"></span><b>Cocher tout</b>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
                <?php if($classrooms5->count() >= 1): ?>
                  <hr>
                <p class="text-center" style="color: #c22e6d"><b>Master II</b></p>
                <?php endif; ?>
                <div class="row">
                  <?php $__currentLoopData = $classrooms5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox5 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" name="classroom[]" class="check5" id="<?php echo e($classroom->id); ?>" value="<?php echo e($classroom->id); ?>"/>
                          <span class="check-mark"></span><?php echo e($classroom->name); ?>

                      </label>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($classrooms5->count() >= 1): ?>
                  <div class="col col-md-4 col-lg-4">
                    <div class="form-group options checkbox5 ">
                      <label class="checkbox checkbox-success">
                          <input type="checkbox" class="check5" id="checkAll5">
                          <span class="check-mark"></span><b>Cocher tout</b>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>

                </div>

                <div class="col-sm-6">

                <div class="form-group">
                  <label><b>Entrer le titre du message</b></label>
                  <input type="text" name="title" class="form-control" required>
                 <!-- <small class="text-danger">Field email is invalid.</small>-->
                </div>

                <div class="form-group">
                  <label><b>Description</b></label>
                  <textarea rows="4" name="description" class="form-control" required></textarea>
                  <small class="text-secondary">1000 mots maximums.</small>
                </div>


                  <div class="form-group">
                    <button class="btn btn-success" name="submit" type="submit">
                      Envoyer le message
                    </button>
                  </div>
                </div>

              </div><!--END ROW-->

                  </form>

            </div>
          <hr>

              </div>
          <hr>

<!--
<div class="container">
   <div class="col-md-offset-5 col-md-5 check-row">
<form role="form">
  <div class="form-group">

  <div class="checkbox">
    <label>
      <input type="checkbox" class="check" id="checkAll"> Check All
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" class="check"> Check me out
    </label>
  </div>


    <div class="checkbox">
    <label>
      <input type="checkbox" class="check"> Check me out
    </label>
  </div>

    <div class="checkbox">
    <label>
      <input type="checkbox" class="check"> Check me out
    </label>
  </div>
</form>
  </div>
 </div>
-->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>
<script type="text/javascript">

  $("#checkAll1").click(function () {
    $(".check1").prop('checked', $(this).prop('checked'));
});

  $("#checkAll2").click(function () {
    $(".check2").prop('checked', $(this).prop('checked'));
});

  $("#checkAll3").click(function () {
    $(".check3").prop('checked', $(this).prop('checked'));
});

  $("#checkAll4").click(function () {
    $(".check4").prop('checked', $(this).prop('checked'));
});

  $("#checkAll5").click(function () {
    $(".check5").prop('checked', $(this).prop('checked'));
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/manager/smessage.blade.php ENDPATH**/ ?>