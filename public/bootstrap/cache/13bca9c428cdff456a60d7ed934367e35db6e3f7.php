


<?php $__env->startSection('content'); ?>

  <?php use Carbon\Carbon;?>
  <?php $ressource="activve" ;?>
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
      <?php echo $__env->make('layouts.sidebarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->


        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item " aria-current="page">Ressources</li>
            <li class="breadcrumb-item active" aria-current="page">Par élève</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

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

  <h4 class="my-4 text-center">LISTE DES CLASSES OU VOUS INTERVENEZ</h4>


        <div class="row">
        <?php
            for ($i=0; $i < count($UniqueClassrooms); $i++) { ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #26bc2c">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($UniqueClassrooms[$i]); ?>

                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>

            <hr>
                <h4 class="card-title text-center">
                    <a href="/teacher/SressourceStudent?q=<?php echo e($classrooms->where('name',$UniqueClassrooms[$i])->pluck('id')->first()); ?>" class="btn btn-success"> AFFICHER LES ELEVES DE CETTE CLASSE </a>
                </h4>

              </div>
            </div>
          </div>

          <?php
          }
          ?>
        </div><!-- END ROW -->

        <?php if(count($UniqueClassrooms) <= 0 ): ?> 
        <p class="text-center">
          <button class="btn btn-danger"> Il n'existe aucune classe dans laquelle vous intervenez </button>
        </p>
        <?php endif; ?>

        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/Sressource.blade.php ENDPATH**/ ?>