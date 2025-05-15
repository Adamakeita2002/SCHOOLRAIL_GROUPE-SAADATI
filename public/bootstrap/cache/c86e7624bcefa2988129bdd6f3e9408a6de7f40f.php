


<?php $__env->startSection('content'); ?>


<?php 
use Carbon\Carbon;
$today = Carbon::today();
?>
  <?php $parametre="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Année Scolaire</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->



<hr>
 <!-- Page Heading 
  <h4 class="my-4 text-center">LISTE DES PROFESSEURS</h4>-->

<div class="col-md-9">

    <div class="nav-tabs-responsive">
  <ul class="nav nav-tabs-progress nav-tabs-4 mb-4">
    <li class="nav-item">
      <a href="#account" class="nav-link active" data-toggle="tab">
        <span class="font-lg">1.</span> ANNEE SCOLAIRE 
        <small class="d-block text-secondary">
          DETERMINER L'ANNEE SCOLAIRE
        </small>
      </a>
    </li>
    <li class="nav-item">
      <a href="#confirmation" onclick="testVariable()" class="nav-link" data-toggle="tab">
        <span class="font-lg">2.</span> CONFIRMER
        <small class="d-block text-secondary">
          VALIDER LES INFORMATIONS
        </small>
      </a>
    </li>
  </ul>



  <form  action="/kuro/admin/CreateSY" class="tab-content" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

    <div id="account" class="tab-pane show active">
      <div class="mb-3">
        <a href="#account-collapse" data-toggle="collapse">
          <span class="font-lg">1.</span> ANNEE SCOLAIRE 
          <small class="d-block text-secondary">
            ANNEE SCOLAIRE
          </small>
        </a>
      </div>
      <div id="account-collapse" class="collapse show" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 1 sur 2</small>
        </div>
        <div class="row">

          <div class="form-group">
            <label><b>ANNEE SCOLAIRE</b></label>
            <select class="form-control" name="today" id="sample1" required>
              <option value="">Déterminer l'annee scolaire</option>
              <option value="<?php echo e($today->year); ?> - <?php echo e($today->year + 1); ?>">ANNEE SCOLAIRE <?php echo e($today->year); ?> - <?php echo e($today->year + 1); ?>  </option>
            </select>
          </div>
          <input type="hidden" value="<?php echo e($today->year); ?>" name="sy">

        </div>

        <div class="d-none d-md-block">
          <hr>
          <div class="d-flex mb-3">
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
          <span class="font-lg">2.</span> Confirmer!
          <small class="d-block text-secondary">
            Confirmer la création de la classe
          </small>
        </a>
      </div>
      <div id="confirmation-collapse" class="collapse" data-parent="#formOrder">
        <div class="text-secondary mb-3">
          <small>Etape 2 sur 2</small>
        </div>
        <div class="card">
          <div class="card-body">


            <div class="row">
              <div class="col-12 col-md-3 col-lg-2">
                <label class="text-secondary">Année Scolaire</label>
              </div>
              <div class="col-12 col-md-9 col-lg-10">
                <div class="mb-2"><b><span id="spanResult1"></b></div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-3 col-lg-2">
                <label class="text-secondary">Semestre</label>
              </div>
              <div class="col-12 col-md-9 col-lg-10">
                <div class="mb-2">SEMESTRE I</div>
              </div>
            </div>
          </div>
          
          <script>
        function testVariable() {
            var strText1 = document.getElementById("sample1").value;          

            var result1 = strText1;

            document.getElementById('spanResult1').textContent = result1;

        }
    </script>
        </div>
        <hr>
        <div class="d-block d-md-flex">
          <button type="button" class="btn btn-outline-success d-none d-md-inline mb-3" data-form-step="#account">
            <i class="icon-arrow-left font-sm"></i>
              Année Scolaire 
          </button>
          <div class="d-block d-md-inline ml-auto mb-3">
            <button type="submit" class="btn btn-success btn-block">
              Créer l'année scolaire
            </button>
          </div>
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

        <?php if(session('status2')): ?>
            <div align="center">
                <div class="alert alert-danger text-center">
                 <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                 Car le premier et le second semestre de l'année en cours ne sont pas encore bouclés.

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

</div> <!-- END container-fluid -->



      </div> <!-- APP CONTENT -->
    </div><!-- APP BODY -->
  </div><!-- APP -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/schoolYear.blade.php ENDPATH**/ ?>