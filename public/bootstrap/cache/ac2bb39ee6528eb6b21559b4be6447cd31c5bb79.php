


<?php $__env->startSection('content'); ?>
<script type="text/javascript">

    function confirmation() {
        var strText1 = document.getElementById("sample1").value;
        var strText2 = document.getElementById("sample2").value;
        var strText3 = document.getElementById("sample3").value;
        var strText4 = document.getElementById("sample4").value;
        var strText5 = document.getElementById("sample5").value;
        var strText6 = document.getElementById("sample6").value;

    }

    var x= 'bankai';

</script>
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
            <li class="breadcrumb-item active" aria-current="page">Créer une classe</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->
          <div class="row">

            <div class="col-md-3">
              <img class=" img-thumbnail card-img-top mx-auto d-block" src="/public/img/large/xclassroom.jpg" alt="Card image" style="width:250px; padding-top: 20px">
            </div>

<div class="col-md-9">

    <div class="nav-tabs-responsive">
  <ul class="nav nav-tabs-progress nav-tabs-4 mb-4">
    <li class="nav-item">
      <a href="#account" class="nav-link active" data-toggle="tab">
        <span class="font-lg">1.</span> Information de la classe
        <small class="d-block text-secondary">
          Entrer les differentes informations de la classe
        </small>
      </a>
    </li>
    <li class="nav-item">
      <a href="#personal" class="nav-link" data-toggle="tab">
        <span class="font-lg">2.</span> Programme de la classe
        <small class="d-block text-secondary">
          Déterminer le programme à affecter à cette classe
        </small>
      </a>
    </li>
    <li class="nav-item">
      <a href="#payment" class="nav-link" data-toggle="tab">
        <span class="font-lg">3.</span> Année Scolaire
        <small class="d-block text-secondary">
          Confirmer l'année scolaire de la classe
        </small>
      </a>
    </li>
    <li class="nav-item">
      <a href="#confirmation" onclick="testVariable()" class="nav-link" data-toggle="tab">
        <span class="font-lg">4.</span> Confirmer la classe
        <small class="d-block text-secondary">
          Valider les informations entrées
        </small>
      </a>
    </li>
  </ul>



  <form  action="/kuro/admin/CreateClassroom" class="tab-content" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
    <input type="hidden" value="<?php echo e($academicyearP->id); ?>" name="academicyear_id">

    <div id="account" class="tab-pane show active">
      <div class="mb-3">
        <a href="#account-collapse" data-toggle="collapse">
          <span class="font-lg">1.</span> Information de la classe
          <small class="d-block text-secondary">
            Entrer les informations de la classe
          </small>
        </a>
      </div>
      <div id="account-collapse" class="collapse show" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 1 sur 4</small>
        </div>
        <div class="row">

          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label><b>Nom de la classe</b></label>
              <input type="text" class="form-control" placeholder="GESCOM" name="name" id="sample1" required>
              <small class="text-danger">Ex: GESTION COMMERCIALE = GESCOM </small>
            </div>
          </div>

        <div class="form-group">
          <label><b>Entrer le niveau</b></label>
          <select class="form-control" name="level" id="sample2" required>
            <option value="">Choix du niveau</option>
            <option value="1">1ère Année</option>
            <option value="2">2ème Année</option>
            <option value="3">Licence Professionnelle</option>
            <option value="4">Master I</option>
            <option value="5">Master II</option>
          </select>
        </div>

          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label><b>Code de la classe</b></label>
              <input type="text" class="form-control" name="code" id="sample3" placeholder="A ou B...">
              <small class="text-danger">Le code permet de differencier deux ou plusieurs classes ayant le meme programme  </small>
              <small class="text-danger">GESCOM 1 A, GESCOM 1 B, GESCOM 1 C...  </small>
            </div>
          </div>

        </div>

        <div class="d-none d-md-block">
          <hr>
          <div class="d-flex mb-3">
            <button type="button" class="btn btn-success ml-auto" data-form-step="#personal">
              Programme de la classe
              <i class="icon-arrow-right font-sm"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="personal" class="tab-pane">
      <div class="mb-3">
        <a href="#personal-collapse" data-toggle="collapse">
          <span class="font-lg">2.</span> Programme de la classe
          <small class="d-block text-secondary">
            Déterminer le programme d'étude de la classe
          </small>
        </a>
      </div>
      <div id="personal-collapse" class="collapse" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 2 sur 4</small>
        </div>

          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">

              <div class="form-group">
                <label>Programme de la classe</label>
                <select class="form-control" name="program_name" id="sample4" required="">
                  <option>Choisissez le programme affecter à la classe</option>
                  <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($program->name); ?>" ><?php echo e($program->fullname); ?> : <?php echo e($program->name); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

            </div>
          </div>

        <div class="d-none d-md-block">
          <hr>
          <div class="d-flex mb-3">
            <button type="button" class="btn btn-outline-success" data-form-step="#account">
              <i class="icon-arrow-left font-sm"></i>
                Information de la classe
            </button>
            <button type="button" class="btn btn-success ml-auto" data-form-step="#payment">
              Année Scolaire de la classe
              <i class="icon-arrow-right font-sm"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="payment" class="tab-pane">
      <div class="mb-3">
        <a href="#payment-collapse" data-toggle="collapse">
          <span class="font-lg">3.</span> Année Scolaire
          <small class="d-block text-secondary">
            Déterminer l'année scolaire de la classe
          </small>
        </a>
      </div>
      <div id="payment-collapse" class="collapse" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 3 sur 4</small>
        </div>

        <div class="col-md-12">
          <p class="text-center">
              <span > <button class="btn btn-dark" id="sample5" ><b><?php echo e($academicyearP->labelYear); ?> </b></button> </span>

          </p>
        </div>

        <div class="d-none d-md-block">
          <hr>
          <div class="d-flex mb-3">
            <button type="button" class="btn btn-outline-success" data-form-step="#personal">
              <i class="icon-arrow-left font-sm"></i>
              Programme de la classe
            </button>
            <button type="button" class="btn btn-success ml-auto" onclick="testVariable()" data-form-step="#confirmation">
              Confirmation
              <i class="icon-arrow-right font-sm"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="confirmation" class="tab-pane">
      <div class="mb-3">
        <a href="#confirmation-collapse" data-toggle="collapse">
          <span class="font-lg">4.</span> Confirmer!
          <small class="d-block text-secondary">
            Confirmer la création de la classe
          </small>
        </a>
      </div>
      <div id="confirmation-collapse" class="collapse" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 4 sur 4</small>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-3 col-lg-2">
                <label class="text-secondary">Classe</label>
              </div>
              <div class="col-12 col-md-9 col-lg-10">
                <div class="mb-2"><b><span id="spanResult1"></b></div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-3 col-lg-2">
                <label class="text-secondary">Programme</label>
              </div>
              <div class="col-12 col-md-9 col-lg-10">
                <div class="mb-2"><b><span id="spanResult4"></b></div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-3 col-lg-2">
                <label class="text-secondary">Année Scolaire</label>
              </div>
              <div class="col-12 col-md-9 col-lg-10">
                <div class="mb-2"><?php echo e($academicyearP->labelYear); ?></div>
              </div>
            </div>

          </div>

          <script>
        function testVariable() {
        var strText1 = document.getElementById("sample1").value;
        var strText2 = document.getElementById("sample2").value;
        var strText3 = document.getElementById("sample3").value;
        var strText4 = document.getElementById("sample4").value;
        var strText5 = document.getElementById("sample5").value;

        if (strText2 > 2) {
          var result1 = strText1+' '+strText3;
        }else{
          var result1 = strText1+' '+strText2+' '+strText3;
        }

            var result4 = strText4;
            var result5 = strText5;

            document.getElementById('spanResult1').textContent = result1;
            document.getElementById('spanResult4').textContent = result4;
            document.getElementById('spanResult5').textContent = result5;

        }
    </script>
        </div>
        <hr>
        <div class="d-block d-md-flex">
          <button type="button" class="btn btn-outline-success d-none d-md-inline mb-3" data-form-step="#payment">
            <i class="icon-arrow-left font-sm"></i>
              Année Scolaire
          </button>
          <div class="d-block d-md-inline ml-auto mb-3">
        <?php
            $Csemesters= $academicyearP->semesters->count();
          ?>

          <?php if( $Csemesters==1 ): ?>
            <button type="submit" class="btn btn-success btn-block">
              Créer la classe
            </button>
          <?php else: ?>
          <span class="badge badge-danger">IMPOSSIBLE DE CREER UNE CLASSE PENDANT LE SECOND SEMESTRE</span>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>




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
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->

        <?php if($classrooms->count() == 0): ?>

        <p class="text-center"> <a href="#" class="btn btn-danger">AUCUNE CLASSE DISPONIBLE</a></p>

        <?php endif; ?>



      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/classroom.blade.php ENDPATH**/ ?>