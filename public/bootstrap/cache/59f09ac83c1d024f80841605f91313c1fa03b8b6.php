


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $homework="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Devoirs</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
        <?php $__currentLoopData = $teacher->homeworks->where('academicyear_id',$academicyearP->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class=" text-center mb-0">
              <?php echo e($homework->subject->name); ?> <br> (<?php echo e($homework->testNum); ?> - <?php echo e($homework->subject->classroom->name); ?> )
            </h2>
            <div class="accordion"  id="accordionExample<?php echo e($homework->id); ?>">
            <div class="card " style="background-color:#bbf59d;">
              <div class="card-header bg-secondary " id="heading<?php echo e($homework->id); ?>">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($homework->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($homework->id); ?>">
                   <?php echo e($homework->testNum); ?> - <?php echo e($homework->subject->classroom->name); ?> /
                  <?php $date=Carbon::parse($homework->dateLimite, 'UTC');?>
                  <?php if(now()->lessThanOrEqualTo($homework->dateLimite)): ?>
                  <span class="badge badge-danger" ><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM')); ?></span>
                  <?php else: ?>
                  <span class="badge badge-success" ><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM')); ?></span>
                  <?php endif; ?>
                  </button>
                </h2>
              </div>

              <div id="collapse<?php echo e($homework->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($homework->id); ?>" data-parent="#accordionExample<?php echo e($homework->id); ?>">

        <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead-dark">
              <tr>

                <th scope="col">ETUDIANTS</th>
                <th scope="col">FICHIERS</th>
                <th scope="col">TELECHARGER</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $homework->ahomeworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ahomework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($ahomework->student->name); ?> <?php echo e($ahomework->student->surname); ?></td>
                <td><?php echo e($ahomework->upload); ?></td>
                <td>
                  <?php if(now()->lessThanOrEqualTo($homework->dateLimite)): ?>
                  <p class="card-text text-danger">Disponible à partir du <b><?php echo e($date->locale('fr_FR')->isoFormat('dddd DD MMMM')); ?></b> </p>
                  <?php else: ?>
                  <a href="/files/ahomework/<?php echo e($ahomework->upload); ?>" class="btn btn-primary mr-2" download="<?php echo e($ahomework->upload); ?>"> TELECHARGER <i class="fa fa-download" aria-hidden="true"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

                  <!-- HOMEWORK STATS -->
                <div class="row justify-content-center">
                  <div class="col-sm-6">
                    <div class="card card-body ">
                      <h3 class="text-center">TOTAL PARTICIPANT</h3>
                      <h1 class="text-center"><?php echo e($homework->ahomeworks->count()); ?>/<?php echo e($homework->subject->classroom->students->count()); ?></h1>
                    </div>
                  </div>
                </div>

                  <!-- HOMEWORK STATS -->

                </div>
              </div>

              </div>
            </div>


          </div>


         <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div> <!-- END container-fluid -->


      </div>
    </div>

  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/teacher/Ahomework.blade.php ENDPATH**/ ?>