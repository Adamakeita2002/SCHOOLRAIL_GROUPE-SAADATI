


<?php $__env->startSection('content'); ?>

<?php use Carbon\Carbon;?>
  <?php $teacher="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Ajouter un professeur</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xprofesseur.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

            <div class="col-md-9">

<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form  action="/kuro/admin/CreateTeacher" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer le nom du professeur</b></label>
                        <input type="text" name="name" placeholder="Nom" class="form-control" required>
                        <small class="text-danger">Champ obligatoire </small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le prénom(s) du professeur</b></label>
                        <input type="text" name="surname" placeholder="Prénom(s)" class="form-control" required>
                        <small class="text-danger">Champ obligatoire </small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la date de naissance du professeur</b></label>
                        <input type="date" name="dateofbirth" placeholder="Date de naissance" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la nationalité du professeur</b></label>
                        <input type="texte" name="nationality" placeholder="Nationalité" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le genre</b></label>
                        <select class="form-control" name="gender" required>
                          <option value="">Genre</option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                        <small class="text-danger">Champ obligatoire </small>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>Entrer l'email du professeur</b></label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                        <small class="text-danger">Champ obligatoire </small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer le contact du professeur</b></label>
                        <input type="number" name="tel" placeholder="Telephone" class="form-control" required>
                        <small class="text-danger">Champ obligatoire </small>
                      </div>

                      <div class="form-group">
                        <label><b>Entrer l'adresse du professeur</b></label>
                        <input type="texte" name="address" placeholder="Adresse" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label><b>Entrer la spécialité du professeur</b></label>
                        <input type="text" name="speciality" placeholder="Specialité" class="form-control" >
                        <small class="text-success">Ex: Informatique, Litteraire, Marketeur... </small>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-success" type="submit">
                          Créer le compte du professeur
                        </button>
                      </div>
                  </div>

                </div>

                  </form>

              </div>


        </div>

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

<hr>
 <!-- Page Heading
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>

        <div class="row">
          <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
              <img src="/assets/img/img_avatar1.png" width="100" height="100" class="rounded-circle mx-auto d-block">
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($teacher->name); ?> <?php echo e($teacher->surname); ?>

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
                  <?php if($teacher->subjects->count()==0): ?>
                    <?php $__currentLoopData = $teacher->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php echo e($subject->name); ?> (<?php echo e($subject->classroom->name); ?>),
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </h4>


                <?php if($teacher->subjects->count()==0): ?>
                  <p class="text-danger text-center "> <b>Aucune matière est affectée à ce professeur</b></p>
                <?php endif; ?>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> END ROW -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/teacher.blade.php ENDPATH**/ ?>