


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $student="activve" ;?>
  <?php $q=$_GET["q"] ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">
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
      <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">

            <div class="col-sm-12">

              <!-- Side Widget -->
              <div class="card">
          <h4 class="card-header text-white" style="background-color: #1f9924;"><?php echo e($subject->name); ?> </b> - <?php echo e($subject->classroom->name); ?></h4>
                    <!-- Button trigger modal -->

                <div class="card-body ">
                <?php $__currentLoopData = $subject->absences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                  <?php $date=Carbon::parse($absence->absence_date, 'UTC');?>   

        <h5>
<b><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM')); ?></b>
<a class="btn btn-danger btn-sm" data-toggle="modal" href="#R<?php echo e($absence->id); ?>" data-target="#R<?php echo e($absence->id); ?>"><b>SUPPRIMER <i class="icon-trash"></i></b></a>
        </h5>

              <!-- Modal -->
              <div class="modal fade" id="R<?php echo e($absence->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/teacher/DeleteAbsence')); ?>" method="post" enctype="multipart/form-data" id="theform3">

                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE LISTE D'ABSENCE <i class="icon-trash"></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <div class="modal-body">

                  <div class="text-center">
        <h4> <b><?php echo e($subject->name); ?> - <?php echo e($subject->classroom->name); ?> </b> à la date du <b><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM')); ?></b></h4> 
          

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($absence->id); ?>" hidden="">
                    <input type="hidden" value="<?php echo e($q); ?>" name="classroom_id">

                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token"> 

                  <button type="submit" class="btn btn-danger">
                    OUI, SUPPRIMER LA LISTE <i class="icon-trash"></i>
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
  $('#theform3').submit(function(){
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
                    <?php $__currentLoopData = $absence->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge badge-warning"><b> <?php echo e($student->name); ?> <?php echo e($student->surname); ?> </b></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

              </div>

            </div> <!--End sm6 -->

        </div> <!--End row -->
        <hr>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/VoirAbsenceStudentClas.blade.php ENDPATH**/ ?>