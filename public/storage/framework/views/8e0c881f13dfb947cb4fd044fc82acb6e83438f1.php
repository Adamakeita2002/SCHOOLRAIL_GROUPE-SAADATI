


<?php $__env->startSection('content'); ?>

  <?php $mark="activve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Notes et Moyennes</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

                  <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:260px; padding-top: 20px">
            </div>

            <div class="col-md-5">
              <form  action="/teacher/CreateTest" method="post" enctype="multipart/form-data" id="theform">
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              <input type="hidden" class="form-control" name="semester_id" value="<?php echo e($semesterP->id); ?>" hidden="">

                  <div class="form-group">
                    <label>Classe / Matière</label>
                    <select class="form-control" name="subject_id" required>
                      <option value="">Classe et Matière</option>
                      <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($subject->arretDesNotes==0 AND $subject->classroom->students->count()!==0 ): ?>
                        <option  value="<?php echo e($subject->id); ?>"><?php echo e($subject->classroom->name); ?> / <?php echo e($subject->name); ?></option>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Déterminer le type de test
                      <span class="badge badge-primary ml-3" >Interrogation</span>
                      <span class="badge badge-success ml-3" >Devoir</span>
                      <span class="badge badge-dark ml-3" >Examen</span>
                    </label>
                    <select class="form-control" name="type" required>
                      <option value="">Test  </option>
                      <?php $__currentLoopData = $epreuves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $epreuve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($epreuve->id); ?>"><?php echo e($epreuve->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <!--
              <div class="form-group">
                <label>Nombre de participant</label>
                <input class="form-control" name="participant" type="number" placeholder="Entre un nombre">
              </div>
                  -->

                  <div class="form-group">
                    <label>Année Scolaire / Semestre </label>
                    <select class="form-control" name="academicyear_id">
                      <option value="<?php echo e($academicyearP->id); ?>"> <?php echo e($semesterP->label); ?> </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-success" type="submit">
                      Créer une liste de note
                    </button>
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

          <div class="col-md-4">

            <div class="callout callout-warning">
              <h5>Notice <i class="icon-pin"></i></h5>
              <p>Vous devez imperativement remplir une liste de note que vous avez créée pour une matière specifique, avant de pouvoir créer une nouvelle liste de note pour la même matière</p>
            </div>

            <div class="callout callout-warning">
              <h5>Liste de note<i class="icon-pin"></i></h5>
              <p>Retrouvez ci-dessous, toutes vos listes de note créées</p>
            </div>

          </div>


        </div>

              <?php if(session('status0')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> Impossible de créer cette liste de note!</b><br>
                       <span class="badge badge-danger" style="font-size: 15px;" > <?php echo e(session('status0')); ?> </span>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status01')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> Il manque une note d'examen!</b><br>
                       <b><i class="icon-check"></i> Veuillez saisir la liste de note pour l'examen :</b> <br>
                       <span class="badge badge-danger" style="font-size: 15px;" > <?php echo e(session('status01')); ?> </span>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status02')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> Aucune Note ne doit être nulle</b><br>
                       <b><i class="icon-check"></i> Veuillez rendre conforme la liste de note de cette matière: </b> <br>
                       <span class="badge badge-danger" style="font-size: 15px;" > <?php echo e(session('status02')); ?> </span>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status2')): ?>
                  <div align="center">
                      <div class="alert alert-danger text-center">
                       <b><i class="icon-info"></i> Impossible de créer une nouvelle liste de note!</b><br>
                       <b><i class="icon-check"></i> Veuillez remplir cette liste de note :</b> <br>
                       <span class="badge badge-danger" style="font-size: 15px;" > <?php echo e(session('status2')); ?> </span>
                      </div>
                  </div>
              <?php endif; ?>



              <?php if(session('status3')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status3')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status4')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status4')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status5')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status5')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status6')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status6')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>

              <?php if(session('status7')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status7')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>
              <?php if(session('status8')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status8')); ?></b>
                      </div>
                  </div>
              <?php endif; ?>


<hr>

      <!-- Start ACCORDION -->

      <?php for($i=0; $i < count($UniqueSubjTests); $i++): ?>
      <br>
      <?php
     // $schoolyear=$academicyears->where('id',$test->academicyear_id)->first();
      $subject=$subjects->where('id',$UniqueSubjTests[$i])->first();
      ?>
       <h2 class=" text-center mb-0"><?php echo e($subject->name); ?></h2>
          <div class="accordion" id="accordion<?php echo $i; ?>">
            <div class="card " style="background-color:#bbf59d;">
              <div class="card-header <?php if($subject->arretDesNotes==0): ?> bg-secondary <?php endif; ?> " style="<?php if($subject->arretDesNotes==1): ?>background-color:#26bc2c;<?php endif; ?>"
               id="heading<?php echo $i; ?>">
                <h2 class=" text-center mb-0">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">

                 <!-- <?php echo e($academicyearP->labelYear); ?> /--> <?php echo e($semesterP->label); ?> / <?php echo e($subject->classroom->name); ?>

                  </button>
                </h2>
              </div>

            <div id="collapse<?php echo $i; ?>" class="collapse  " aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion<?php echo $i; ?>">

      <div class="table-responsive">
          <div class="card-body">
            <table class="table ">
            <thead class="thead ">
              <tr>

                <th scope="col">
                  <span class="badge" style="background:#fff; font-size: 20px; color:black;" >Nom & Prenoms</span>
                </th>
                <th scope="col">
                  <?php $__currentLoopData = $epreuves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $epreuve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="<?php if($epreuve->id == 1): ?> badge badge-primary <?php elseif($epreuve->id == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?>" style="font-size: 20px"><?php echo e($epreuve->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </th>
                <th scope="col">
                 <span class="badge" style="background:#fff; font-size: 20px; color:black;"> Moyenne </span>
                </th>
                <th scope="col">
                 <span class="badge" style="background:#fff; font-size: 20px; color:black;"> Rang </span>
                </th>
              </tr>
            </thead>

            <tbody>
<?php $ClaStudents=$students->where('classroom_id',$subject->classroom->id)->all(); ?>

  <form action="<?php echo e(URL::to('/teacher/CreateMark')); ?>" method="post" enctype="multipart/form-data" id="theform2">
        <?php $__currentLoopData = $ClaStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ClaStudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><b><?php echo e($ClaStudent->surname); ?></b> <?php echo e($ClaStudent->name); ?> </td>
            <?php $testsTF=$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',0)->all(); ?>
            <?php $testsFD=$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->all(); ?>

            <td>
            <!--Display Mark -->
            <?php $__empty_1 = true; $__currentLoopData = $testsTF; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <span class="<?php if($test->type == 1): ?> badge badge-primary <?php elseif($test->type == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?> ml-1" style="font-size: 20px; width:65px;" >
                <b><?php echo e($test->testNum); ?></b> <hr class="hrr">
                <input type="number" step="0.01" name="<?php echo e($ClaStudent->id); ?>" min="0" max="20" class="form-control" style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="classroom_id" value="<?php echo e($subject->classroom->id); ?>" hidden="">
                <input type="hidden" class="form-control" name="test_id" value="<?php echo e($test->id); ?>" hidden="">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              </span>
                    <?php if($ClaStudent === end($ClaStudents)): ?>
                    <div class="pt-1">
                      <button type="submit" class="btn <?php if($test->type == 1): ?>  btn-primary <?php elseif($test->type == 2): ?>  btn-success <?php else: ?>  btn-dark <?php endif; ?> pt-2">
                        Valider
                      </button>
                    </div>
    </form>
<script type="text/javascript">
  $(function()
{
  $('#theform2').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger pt-2" data-toggle="modal" data-target="#T<?php echo e($test->id); ?>">
                    Supprimer <i class="icon-trash"></i>
                  </button>
                  <!-- Modal DELETE SAISI DE testTF -->
                  <div class="modal fade" id="T<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="<?php echo e(URL::to('/teacher/DeleteTest')); ?>" method="post" enctype="multipart/form-data" id="theform3">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE SAISIE DE NOTE <i class="icon-trash"></i></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Voulez-vous vraiment supprimer cette saisie de note?</p>
                        <p class="<?php if($test->type == 1): ?> badge badge-primary <?php elseif($test->type == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?>" style="font-size: 15px;" >
                        <?php echo e($subject->name); ?> / <?php if($test->type == 1): ?> Interrogation <?php elseif($test->type == 2): ?> Devoir <?php else: ?> Examen <?php endif; ?> N<?php echo e($test->testNum); ?>

                        </p>

                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($test->id); ?>" hidden="">

                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                      <button type="submit" class="btn btn-danger">
                        OUI, SUPPRIMER CETTE SAISIE DE NOTE <i class="icon-trash"></i>
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
                    </div><!-- Modal DELETE SAISI DE testTF -->

                  </div>
                  <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php $__currentLoopData = $testsFD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php  $mark=$marks->where('test_id',$test->id)->where('student_id',$ClaStudent->id)->first(); ?>
                <?php if(!empty($mark)): ?>
                  <a class="btn text-white mr-2 <?php if($test->type == 1  ): ?> btn-primary <?php elseif($test->type == 2 ): ?> btn-success <?php elseif($test->type == 3 ): ?> btn-dark <?php endif; ?> ml-1 " href="#" data-toggle="modal" data-target="<?php if($subject->arretDesNotes==0): ?>#M<?php echo e($mark->id); ?><?php endif; ?>" style="font-size: 20px;" >
                   <b><?php echo e($test->testNum); ?></b> <hr class="hrr"><?php if($mark->value==null): ?> Nul <?php else: ?><?php echo e($mark->value); ?><?php endif; ?>
                  </a>
                  <!-- Modal Edit Mark -->
                  <div class="modal fade" id="M<?php echo e($mark->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette note de l'etudiant <b><?php echo e($ClaStudent->surname); ?> <?php echo e($ClaStudent->name); ?></b> </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Entrer la correction:</p>
                        <form></form><!-- GENJUTSU -->

        <form action="<?php echo e(URL::to('/teacher/EditMark')); ?>" method="post" enctype="multipart/form-data" id="theform4">
              <span class="<?php if($test->type == 1): ?> badge badge-primary <?php elseif($test->type == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?>" style="font-size: 20px; width:65px;" >
                <?php echo e($test->testNum); ?> <hr class="hrr">
                <input type="number" step="0.01" name="value" min="0" max="20" placeholder="<?php if($mark->value==null): ?> Nul <?php else: ?><?php echo e($mark->value); ?><?php endif; ?>" class="form-control" required style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="mark_id" value="<?php echo e($mark->id); ?>" hidden="">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              </span><br><br>

                      <button type="submit" class="btn btn-warning text-white">
                        Valider
                      </button>
        </form>
<script type="text/javascript">
  $(function()
{
  $('#theform4').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
                      </div>

                    </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                      </div>

                      </div>
                    </div>

                    </div>
                  <?php else: ?>
                  <a class="btn text-white mr-2 <?php if($test->type == 1): ?> btn-primary <?php elseif($test->type == 2): ?> btn-success <?php elseif($test->type == 3): ?> btn-dark <?php else: ?> btn-danger  <?php endif; ?> ml-1 " href="#" data-toggle="modal" data-target="#M<?php echo e($test->id); ?>" style="font-size: 20px;" >
                    <?php echo e($test->testNum); ?> <hr class="hrr">Abs
                  </a>
                  <!-- Modal CreateAbsMark -->
                  <div class="modal fade" id="M<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="<?php echo e(URL::to('/teacher/CreateAbsMark')); ?>" method="post" enctype="multipart/form-data" id="theform5">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette note de l'etudiant <b><?php echo e($ClaStudent->surname); ?> <?php echo e($ClaStudent->name); ?></b> </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Entrer la correction:</p>

              <span class="<?php if($test->type == 1): ?> badge badge-primary <?php elseif($test->type == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?> ml-1" style="font-size: 20px; width:65px;" >
                <?php echo e($test->testNum); ?> <hr class="hrr">
                <input type="number" step="0.01" name="value" min="0" max="20" placeholder="Abs" class="form-control" required style="padding: 2px 2px;">
                <input type="hidden" class="form-control" name="student_id" value="<?php echo e($ClaStudent->id); ?>" hidden="">
                <input type="hidden" class="form-control" name="test_id" value="<?php echo e($test->id); ?>" hidden="">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              </span><br> <br>

                      <button type="submit" class="btn btn-warning text-white">
                        Valider
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
  $('#theform5').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
                    </div>
                    <!-- END Modal CreateAbsMark -->
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

            </td>


            <td> <!-- START CALCULE DE MOYENNE -->

              <strong>
                <?php $subjectavg=$ClaStudent->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                <span class="<?php if($subjectavg): ?> <?php if($subjectavg->valueGrle >= 10): ?> badge btn-vert text-white <?php else: ?> badge badge-danger text-white <?php endif; ?> <?php else: ?> badge btn-vert text-white  <?php endif; ?>  " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->valueGrle); ?> <?php else: ?> ... <?php endif; ?> </span>
              </strong>

            </td> <!-- END CALCULE DE MOYENNE -->
            <td> <!-- START RANK -->

              <strong>
                <?php $subjectavg=$ClaStudent->subjectavgs->where('subject_id',$subject->id)->where('semester_id',$semesterP->id)->first(); ?>
                <span class=" badge badge-secondary text-white " style="font-size: 20px; width:65px;" ><?php if($subjectavg): ?> <?php echo e($subjectavg->rank); ?> <?php else: ?> ... <?php endif; ?> </span>
              </strong>

            </td> <!-- END RANK -->

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php if(!$subjectavg): ?> <!--START IMPOSSIBLE DE SUPPRIMER LES NOTES CAR LES NOTES SONT DEFINITIVES-->
        <tr>
        <?php $testsFD=$testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->all(); ?>
         <?php if(!empty($testsFD) >=1 ): ?>
         <td class="text-danger"><b>SUPPRIMER UNE NOTE SAISIE</b></td>
          <td>
            <?php $__currentLoopData = $testsFD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <button class="<?php if($test->type == 1): ?> btn btn-primary <?php elseif($test->type == 2): ?> btn btn-success <?php else: ?> btn btn-dark <?php endif; ?> ml-1" data-toggle="modal" data-target="#TFD<?php echo e($test->id); ?>" ><?php if($test->type == 1): ?> Interrogation <?php echo e($test->testNum); ?> <?php elseif($test->type == 2): ?> Devoir <?php echo e($test->testNum); ?> <?php else: ?> Examen <?php echo e($test->testNum); ?> <?php endif; ?></button>

                  <!-- Modal DELETE testTF -->
                  <div class="modal fade" id="TFD<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="<?php echo e(URL::to('/teacher/DeleteMark')); ?>" method="post" enctype="multipart/form-data" id="theform6">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">SUPPRIMER CETTE LISTE DE NOTE SAISIE <i class="icon-trash"></i></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <div class="modal-body">

                      <div class="text-center">

                        <p>Voulez-vous vraiment supprimer cette liste de note saisie ?</p>
                        <p class="<?php if($test->type == 1): ?> badge badge-primary <?php elseif($test->type == 2): ?> badge badge-success <?php else: ?> badge badge-dark <?php endif; ?>" style="font-size: 15px;" ><?php if($test->type == 1): ?> Interrogation <?php echo e($test->testNum); ?> <?php elseif($test->type == 2): ?> Devoir <?php echo e($test->testNum); ?> <?php else: ?> Examen <?php echo e($test->testNum); ?> <?php endif; ?>
                        </p>
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($test->id); ?>" hidden="">
                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                      <button type="submit" class="btn btn-danger">
                        OUI, SUPPRIMER  <i class="icon-trash"></i>
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
  $('#theform6').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
                    </div><!-- Modal DELETE testTF -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
          <?php endif; ?>
        </tr>
      <?php endif; ?>  <!--END IMPOSSIBLE DE SUPPRIMER LES NOTES CAR LES NOTES SONT DEFINITIVES-->
            </tbody>
          </table>


          <?php if(!$subjectavg): ?>
              <div class="row">
                <div class="col-sm-6">
                    <div class="card card-body bg-secondary" style="color:white;">
                  <h3><b>Interrogation</b> : <?php echo e($testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',1)->count()); ?> </h3>
                  <h3><b>Devoir</b> : <?php echo e($testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',2)->count()); ?></h3>
                  <h3><b>Examen</b> : <?php echo e($testsP->where('subject_id',$UniqueSubjTests[$i])->where('state',1)->where('type',3)->count()); ?></h3>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-body bg-secondary" style="color:white;">
                <h4 class="text-center" ><b><?php echo e($semesterP->label); ?></b></h4>
                <h3 class="text-center" ><?php echo e($subject->name); ?> </h3>
                <h3 class="text-center" ><?php echo e($subject->classroom->name); ?></h3>
                    </div>
                </div>
              </div>

          <?php else: ?>
              <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card card-body" style="color:white; background-color: #26bc2c;">
                        <h4 class="text-center" ><b><?php echo e($semesterP->label); ?></b></h4>
                        <h3 class="text-center" ><?php echo e($subject->name); ?> </h3>
                        <h3 class="text-center" ><?php echo e($subject->classroom->name); ?></h3>
                        <h3 class="text-center" ><b>Les notes de cette matière ont été calculées</b></h3>
                    </div>
                </div>
              </div>

          <?php endif; ?>

            <br>

          <?php if($semesterP->arretDesNotes == 1 AND !$subjectavg ): ?>
          <!--  <?php if(!$subjectavg): ?> START IMPOSSIBLE DE RECALCULER LES NOTES ELLES  SONT DEFINITIVES-->

                <p class="text-center">
                 <a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#exampleModal<?php echo e($subject->id); ?>">
                   <b>CALCULER LES MOYENNES</b>
                 </a>
                </p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous confirmer le calcul des moyennes</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center">En confirmant, les moyennes de cette matière<br><b>(<?php echo e($subject->name); ?>)</b><br> seront calculées et marquées définitives</p>
                        <form  action="/teacher/CreateSubjectAvg" method="post" enctype="multipart/form-data" id="theform8">
                         <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                         <input type="hidden" name="subjID" value="<?php echo e($subject->id); ?>">
                          <p class="text-center"><button class="btn btn-bordo" type="submit"><b>CONFIRMER</b></button></p>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script type="text/javascript">
                  $(function()
                {
                  $('#theform8').submit(function(){
                    $("button[type='submit']", this)
                     // .val('Please Wait...')
                      .attr('disabled', 'disabled')
                      .html('Veuillez patienter...');
                    return true;
                  });
                });
                </script>

        <!--  <?php endif; ?> END IMPOSSIBLE DE RECALCULER LES NOTES ELLES NOTES SONT DEFINITIVES-->
        <?php endif; ?>
            <!-- //*** LE BOUTON POUR BOUCLER LES LISTES DE NOTE ***//
            <p class="text-center"><a href="#" class="btn btn-bordo" data-toggle="modal" data-target="#BCL<?php echo e($subject->id); ?>" ><i class="icon-printer"></i> Boucler cette liste de note </a></p> -->
              <!-- Modal Delete teacher -->

          <!-- Modal Edit teacher -->
            <div class="modal fade" id="BCL<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Modal Edit teacher -->
            <form action="<?php echo e(URL::to('/teacher/CreateSubjectAvg')); ?>" method="post" enctype="multipart/form-data" id="theform7">
              <!--EDIT FORM-->
              <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
              <div class="modal-dialog modal-lg" role="document"><!--MODAL DIALOG -->
                <div class="modal-content"> <!--MODAL CONTENT -->
                  <div class="modal-header"> <!--MODAL HEADER -->
                      <h5 class="modal-title" id="exampleModalLabel"><b>Voulez-vous vraiment boucler cette liste de note?</b>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                <div class="modal-body"> <!--MODAL BODY -->

                <h2 class="text-center"> Veuillez confirmer!</h2>

                <input type="hidden" class="form-control" name="subject_id" value="<?php echo e($subject->id); ?>" hidden="">
                <input type="hidden" class="form-control" name="semester_id" value="<?php echo e($semesterP->id); ?>" hidden="">

                  <div class="form-group text-center">
                    <button class="btn btn-bordo" type="submit">
                      Confirmer
                    </button>
                  </div>

                </div><!--END MODAL BODY -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                </div>

                </div><!--MODAL CONTENT -->
              </div><!--MODAL DIALOG -->
              <!--END EDIT FORM-->
            </form>
<script type="text/javascript">
  $(function()
{
  $('#theform7').submit(function(){
    $("button[type='submit']", this)
     // .val('Please Wait...')
      .attr('disabled', 'disabled')
      .html('Veuillez patienter...');
    return true;
  });
});
</script>
          </div><!-- Modal Edit teacher -->

              </div>
            </div>
          </div>


          </div>
          <?php endfor; ?>
         <!-- END ACCORDION -->
        <hr>

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/teacher/mark.blade.php ENDPATH**/ ?>