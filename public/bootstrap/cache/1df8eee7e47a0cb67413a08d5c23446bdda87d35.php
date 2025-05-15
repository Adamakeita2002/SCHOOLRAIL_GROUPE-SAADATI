


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $classroom="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Modifier une classe</li>
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

<hr>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES CLASSES DISPONIBLES</h4>

        <div class="row">
          <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($classroom->name); ?>

                </h2>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>
                <h4 class="card-title text-center">
                <?php echo e($classroom->program->levelVar); ?> <br> <?php echo e($classroom->program->fullname); ?>

                </h4>

            <hr>
            <div class="row" > 
              <div class="col-sm-6">
              <span><!-- START Edit classroom -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM<?php echo e($classroom->id); ?>" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit classroom -->
                <div class="modal fade" id="MM<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/modifyClassroom')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette classe 
                            <b><?php echo e($classroom->name); ?></b> 
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>
            
                      <div class="form-group">
                        <label><b>Nom de la classe</b></label>
                        <input type="text" class="form-control" placeholder="<?php echo e($classroom->name); ?>" name="name" id="sample1" required>
                        <small class="text-danger">Ex: GESTION COMMERCIALE = GESCOM </small>
                      </div>


                        <div class="form-group">
                          <label><b>Entrer le niveau</b></label>
                          <select class="form-control" required name="level" >
                            <option value="">Re-confirmer le niveau de la classe</option>
                            <option value="1">1ère Année</option>
                            <option value="2">2ème Année</option>
                            <option value="3">Licence Professionnelle</option>
                            <option value="4">Master I</option>
                            <option value="5">Master II</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label><b>Code de la classe</b></label>
                          <input type="text"  placeholder="Re-confirmer le code si besoin" class="form-control" name="code" id="sample3" placeholder="A ou B...">
                          <small class="text-danger">Le code permet de differencier deux ou plusieurs classes ayant le meme programme  </small>
                          <small class="text-danger">GESCOM 1 A, GESCOM 1 B, GESCOM 1 C...  </small>
                        </div>

                        <div class="form-group">
                          <label>Programme de la classe</label>
                        <select class="form-control" name="program_name" id="sample4" required>
                          <option value="">Re-confirmer le programme de la classe</option>
                          <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($program->name); ?>" ><?php echo e($program->fullname); ?> : <?php echo e($program->name); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>


                        <input type="hidden" class="form-control" name="id" value="<?php echo e($classroom->id); ?>" hidden="">
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
              </span><!-- END Edit classroom -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete classroom -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD<?php echo e($classroom->id); ?>" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete classroom -->
                <div class="modal fade" id="MD<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/deleteClassroom')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un classroomme d'étude</h5>                        
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE CLASSE?</p>
                        <h4 class="card-title text-center">
                        <?php echo e($classroom->name); ?> 
                        </h4>
            
                        <input type="hidden" class="form-control" name="id" value="<?php echo e($classroom->id); ?>" hidden="">
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
              </span><!-- END Edit classroom -->
            </div>

          </div>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        <?php if($classrooms->count() <= 0 ): ?> 
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucune classe créée </button>
        </p>
        <?php endif; ?>


      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/editClassroom.blade.php ENDPATH**/ ?>