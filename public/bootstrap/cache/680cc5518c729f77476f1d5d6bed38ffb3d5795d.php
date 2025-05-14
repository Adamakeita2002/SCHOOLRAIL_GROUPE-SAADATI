


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $test="activve" ;?>

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
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

 <!-- Page Heading -->
  <h2 class=" text-center my-4">DEVOIRS EN LIGNE</h2>


              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>


        <div class="row">
        <?php $countHomework=0;  ?>
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $subject->homeworks->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $countHomework++;  ?>
          <div class="col-lg-4 col-sm-6 mb-4" id="H<?php echo e($homework->id); ?>">
            <div class="card h-100">
              <div class="card-body bg-primary">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($subjects->where('id',$homework->subject_id)->pluck('name')->first()); ?>

                </h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">
                  (<?php echo e($homework->testNum); ?>)
                </h4>
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="card-title text-center text-primary">
                      <u>Mise en ligne :</u>
                    </h6>
                    <h6 class="card-title text-center text-primary">
                        <?php $date=Carbon::parse($homework->created_at, 'UTC');?>
                        <?php echo e($date->locale('fr_FR')->isoFormat('DD MMMM YYYY')); ?>

                    </h6>
                  </div>
                  <div class="col-sm-6">
                     <h6 class="card-title text-center text-danger">
                     <u>Date Limite :</u>
                    </h6>
                    <h6 class="card-title text-center text-danger">
                        <?php $date=Carbon::parse($homework->dateLimite, 'UTC');?>
                        <?php echo e($date->locale('fr_FR')->isoFormat('DD MMMM YYYY')); ?>

                    </h6>
                  </div>
                </div>
                <!-- CHECK IF TIME HAS NOT EXPIRED AND HOMEWORK IS DONE -->
                <?php $StuAhomework=$ahomeworks->where('homework_id',$homework->id)->first() ?>
                 <?php if(now()->lessThanOrEqualTo($homework->dateLimite) AND empty($StuAhomework) ): ?>
                <p class="card-text text-center">
                  <a href="/files/homework/<?php echo e($homework->upload); ?>" download="<?php echo e($homework->upload); ?>" class="btn btn-primary">Telecharger le devoir <i class="fa fa-download" aria-hidden="true"></i>
                  </a>
                </p>

                <p class="card-text text-center">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Hj<?php echo e($homework->id); ?>" >
                    <i class="fa fa-upload" aria-hidden="true"></i>  Envoyer votre réponse</a>
                </p><!-- Button trigger modal -->


              <!-- Modal -->
              <div class="modal fade" id="Hj<?php echo e($homework->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/student/CreateAhomework')); ?>" method="post" enctype="multipart/form-data" id="theform">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Envoyer votre reponse a ce test <i class="fa fa-upload" aria-hidden="true"></i>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">

                    <p><b><?php echo e($subjects->where('id',$homework->subject_id)->pluck('name')->first()); ?> (<?php echo e($homework->testNum); ?>)</b></p>

                    <p class="text-danger"> <i class="icon-pin"></i> La reponse ne peut être envoyée que une seule fois</p>
                    <p class="text-danger"> <i class="icon-pin"></i> Veuillez bien verifier le fichier que vous envoyez</p>

                  <label><b>Sélectionner le document</b></label>
                  <div class="form-group">
                   <!-- <button type="button" class="btn btn-secondary" data-toggle="file-manager" data-maxsize="1MB" data-type="image/jpeg,image/png">
                      <i class="icon-folder"></i> Selectionner la resource
                    </button>-->
                    <input type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation , text/plain, application/pdf" class="btn btn-secondary" name="upload_file" required>
                  </div>

                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                    <input type="hidden"  name="label" value="<?php echo e($homework->label); ?>" hidden="">
                    <input type="hidden"  name="homework_id" value="<?php echo e($homework->id); ?>" hidden="">

                  <button type="submit" class="btn btn-success">
                    OUI, Envoyer <i class="fa fa-upload" aria-hidden="true"></i>
                  </button>

                  </div>

                </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                  </div>

                  </div>
                </div>
                </form>
<script type="text/javascript">
  $(function()
{
  $('#theform').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
              </div>
              <!--End Modal -->

               <!--
                <p class="card-text text-center text-success" style="font-size: 100px"><i class="icon-check"></i></p>
                <p class="card-text text-center text-success">En ligne !</p>
                -->
                 <?php elseif(!empty($StuAhomework)): ?>
                <p class="card-text text-center text-success" style="font-size: 100px"><i class="icon-check"></i></p>
                <p class="card-text text-center text-success">Effectué !</p>
                 <?php else: ?>
                <p class="card-text text-center text-danger" style="font-size: 100px"><i class="icon-close"></i></p>
                <p class="card-text text-center text-danger">Manqué !</p>
                 <?php endif; ?>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <!-- /.row -->
        <?php if($countHomework <= 0): ?>
        <p class="text-center">
          <button class="btn btn-danger"> AUCUN DEVOIR EN LIGNE </button>
        </p>
        <?php endif; ?>



      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<script>
/*******************************************/
$(document).ready(function() {
  $("#success-alert").hide();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });

});
/*******************************************/
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/student/homework.blade.php ENDPATH**/ ?>