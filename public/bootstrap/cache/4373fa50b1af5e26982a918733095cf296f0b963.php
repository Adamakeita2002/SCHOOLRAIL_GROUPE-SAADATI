


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $program="activvve" ;?>

    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbarA', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Créer un programme</li>
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
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>
<hr>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES PROGRAMMES DISPONIBLES</h4>

        <div class="row">
          <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($program->name); ?>

                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px">
                  <img src="/img/large/xfiliere.jpg" width="60" height="60" alt="...">
                </p>
                <h4 class="card-title text-center">
                <?php echo e($program->levelVar); ?> <br> <?php echo e($program->fullname); ?>

                </h4>

                    <h5 class="card-title text-center" style="color: #c22e6d">
                      CLASSES:
                    </h5>

                    <h6>
                    <?php if($program->classrooms->count()==0): ?>
                    <span class="text-danger text-center"> <b>Aucune classe est affectée à ce programme</b>  </span>
                    <?php endif; ?>
                    <?php $__currentLoopData = $program->classrooms->where('academiyear_id',$academicyearP); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span> <a href=""> <?php echo e($classroom->name); ?> <?php echo e($classroom->code); ?> </a> </span> ,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h6>
            <hr>
            <div class="row" >
              <div class="col-sm-6">
              <span><!-- START Edit PROGRAM -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM<?php echo e($program->id); ?>" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit PROGRAM -->
                <div class="modal fade" id="MM<?php echo e($program->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/modifyProgram')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier ce programme
                            <b><?php echo e($program->fullname); ?></b>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>

                        <div class="form-group">
                          <label><b>Entrer le nom du programme</b></label>
                          <input type="text" name="fullname" placeholder="<?php echo e($program->fullname); ?>" class="form-control" >
                         <small class="text-danger">Ex: Finance Comptabilité</small>
                        </div>

                        <div class="form-group">
                          <label><b>Entrer le diminutif du programme</b></label>
                          <input type="text" name="name" required placeholder="<?php echo e($program->name); ?>" class="form-control" >
                          <small class="text-danger">Ex: Finance Comptabilité = FC </small>
                        </div>

                        <div class="form-group">
                          <label><b>Entrer le niveau</b></label>
                          <select class="form-control" name="levelInt" >
                            <option value="<?php echo e($program->levelInt); ?>"><?php echo e($program->levelVar); ?></option>
                            <option value="1">1ère Année</option>
                            <option value="2">2ème Année</option>
                            <option value="3">Licence Professionnelle</option>
                            <option value="4">Master I</option>
                            <option value="5">Master II</option>
                          </select>
                        </div>
                        <input type="hidden" class="form-control" name="id" value="<?php echo e($program->id); ?>" hidden="">
                      <button type="submit" class="btn btn-warning text-white">
                        Valider la modification
                      </button>
                      </div>
                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              </span><!-- END Edit PROGRAM -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete PROGRAM -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD<?php echo e($program->id); ?>" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete PROGRAM -->
                <div class="modal fade" id="MD<?php echo e($program->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/deleteProgram')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un programme d'étude</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE PROGRAMME?</p>
                        <h4 class="card-title text-center">
                        <?php echo e($program->levelVar); ?> <br> <?php echo e($program->fullname); ?>

                        </h4>

                        <input type="hidden" class="form-control" name="id" value="<?php echo e($program->id); ?>" hidden="">
                      <button type="submit" class="btn btn-danger">
                        Valider la suppression
                      </button>
                      </div>
                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              </span><!-- END Edit PROGRAM -->
            </div>

          </div>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        <?php if($programs->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun programme crée </button>
        </p>
        <?php endif; ?>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/editProgram.blade.php ENDPATH**/ ?>