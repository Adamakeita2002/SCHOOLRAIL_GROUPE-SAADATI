


<?php $__env->startSection('content'); ?>

<?php use Carbon\Carbon;?>
  <?php $teacher="activve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter un professeur</li>
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
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>

        <div class="row">
          <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
              <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?> <br>
                 <b>(<?php echo e($teacher->image); ?>)</b>
                <form action="<?php echo e(URL::to('/teacher/login')); ?>" method="post" enctype="multipart/form-data" target="_blank">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <input type="hidden" value="<?php echo e($teacher->image); ?>" name="password">
                  <input type="hidden" value="<?php echo e($teacher->email); ?>" name="email">

                  <button class="btn btn-success" type="submit"><b>Compte Professeur</b></button>

                </form>
                </h2>
              </div>

              <div class="card-body">

                    <h4 class="card-title text-center" ><b> Spécialité :  </b> <br>
                      <span><?php echo e($teacher->speciality); ?></span>
                    </h4>

                <hr>
                      <h4 class="card-title mt-2" ><b> Nationalité :  </b>
                        <span><?php echo e($teacher->nationality); ?></span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Age : </b>
                        <?php  $years = Carbon::parse($teacher->dateofbirth)->age;?>
                        <span><?php echo e($years); ?></span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Email : </b>
                        <span><?php echo e($teacher->email); ?></span>
                      </h4>
                <hr>
                      <h4 class="card-title mt-2" ><b> Téléphone : </b>
                        <span><?php echo e($teacher->tel); ?></span>
                      </h4>
                <hr>

                      <h4 class="card-title mt-2" ><b> Adresse : </b>
                        <span><?php echo e($teacher->address); ?></span>
                      </h4>
                <hr>


                <h4 class="card-title text-center">
            <?php $subjects=$semesterP->subjects()->where('teacher_id',$teacher->id)->get();?>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span><?php echo e($subject->name); ?> (<?php echo e($subject->classroom->name); ?>),</span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </h4>


                <?php if($subjects->count()==0): ?>
                  <p class="text-danger text-center "> <b>Aucune matière est affectée à ce professeur cette année</b></p>
                <?php endif; ?>

<!-- STARTING -->

            <hr>
            <div class="row" >
              <div class="col-sm-6">
              <span><!-- START Edit teacher -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM<?php echo e($teacher->id); ?>" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit teacher -->
                <div class="modal fade" id="MM<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/manager/modifyTeacher')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier les informations concernant ce professeur
                            <b><?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?></b>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>

                      <div class="form-group">
                        <label><b>Entrer le nom du professeur</b></label>
                        <input type="text" name="name" placeholder="<?php echo e($teacher->name); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) du professeur</b></label>
                        <input type="text" name="surname" placeholder="<?php echo e($teacher->surname); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance du professeur</b></label>
                        <input type="date" name="dateofbirth" placeholder="<?php echo e($teacher->dateofbirth); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité du professeur</b></label>
                        <input type="texte" name="nationality" placeholder="<?php echo e($teacher->nationality); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="genre">
                          <option value="">Genre (<?php echo e($teacher->genre); ?>)</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'email du professeur</b></label>
                        <input type="email" name="email" placeholder="<?php echo e($teacher->email); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le contact du professeur</b></label>
                        <input type="number" name="tel" placeholder="<?php echo e($teacher->tel); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'adresse du professeur</b></label>
                        <input type="texte" name="address" placeholder="<?php echo e($teacher->address); ?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la spécialité du professeur</b></label>
                        <input type="text" name="speciality" placeholder="<?php echo e($teacher->speciality); ?>" class="form-control">
                        <small class="text-danger">Ex: Informatique, Litteraire, Marketeur... </small>
                      </div>


                        <input type="hidden" class="form-control" name="id" value="<?php echo e($teacher->id); ?>" hidden="">
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
              </span><!-- END Edit teacher -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete teacher -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD<?php echo e($teacher->id); ?>" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete teacher -->
                <div class="modal fade" id="MD<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/manager/deleteTeacher')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'un professeur </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CE PROFESSEUR?</p>
                        <h4 class="card-title text-center">
                        <?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?>

                        </h4>

                        <input type="hidden" class="form-control" name="id" value="<?php echo e($teacher->id); ?>" hidden="">
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
              </span><!-- END Edit teacher -->
            </div>

          </div>

<!-- ENDING -->



              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->

        <?php if($teachers->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> Aucun professeur créé </button>
        </p>
        <?php endif; ?>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/manager/editTEacher.blade.php ENDPATH**/ ?>