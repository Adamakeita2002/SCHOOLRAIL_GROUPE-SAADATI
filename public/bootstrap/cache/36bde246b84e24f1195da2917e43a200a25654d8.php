


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $subject="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Editer une matière</li>
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
  <h4 class="my-4 text-center">LISTE DES MATIERES DISPONIBLES</h4>

        <div class="row">
          <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
              <div class="card-body" style="background-color: #c22e6d">
                <?php if($subject->classroom): ?>
                <h2 class="card-title text-center mt-2" style="color:white;">
                 <?php echo e($subject->name); ?> <br> (<?php echo e($subject->classroom->name); ?>)
                </h2>
                <?php endif; ?>
              </div>
              <div class="card-body">
                <p class="card-text text-center text-success" style="font-size: 70px"><i class="fa fa-th-large" style="color: #c22e6d" aria-hidden="true"></i>
                </p>
                <h4 class="card-title text-center">
                Coefficient <br> <?php echo e($subject->credit); ?>

                </h4>

              <h6>
              <?php if(empty($subject->teacher_id)): ?>
              <span class="text-danger text-center"> <b>Cette matière est affectée à aucun professeur</b>  </span>
              <span class="text-danger text-center"> <b>Cette matière est affectée à aucune classe</b>  </span>
              <?php else: ?>
              <h6 class="text-center"><b>Professeur Responsable:</b></h6>
              <p class="text-success text-center" style="font-size: 20px"><b><?php echo e($subject->teacher->name); ?> <?php echo e($subject->teacher->surname); ?></b></p>     
              <?php endif; ?>
              </h6>

            <hr>
            <div class="row" > 
              <div class="col-sm-6">
              <span><!-- START Edit subject -->
                <p class="text-center"><button class="btn btn-warning text-white" data-toggle="modal" data-target="#MM<?php echo e($subject->id); ?>" ><b>MODIFIER</b></button></p>
                <!-- Modal Edit subject -->
                <div class="modal fade" id="MM<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/modifySubject')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier cette classe 
                            <b><?php echo e($subject->name); ?></b> 
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>Entrer la correction:</p>
            
                <div class="form-group">
                  <label><b>Entrer le nom de la matière</b></label>
                  <input type="text" name="name" class="form-control" placeholder="<?php echo e($subject->name); ?>">
                 <small class="text-danger">Ex: Anglais, Mathématique Financière</small>
                </div>

                <div class="form-group">
                  <label><b>Entrer le coefficient de la matière</b></label>
                  <input type="number" name="credit" class="form-control" placeholder="<?php echo e($subject->credit); ?>">
                  <small class="text-danger">Ex: 2 ou 3... </small>
                </div>

                <!--
                  <div class="form-group">
                    <label><b>Entrer le niveau</b></label>
                    <select class="form-control" name="levelInt" required>
                      <option value="">Niveau</option>
                      <option value="1">1ère Année</option>
                      <option value="2">2ème Année</option>
                      <option value="3">Licence Professionnelle</option>
                      <option value="4">Master I</option>
                      <option value="5">Master II</option>
                    </select>
                  </div>
                -->


                        <input type="hidden" class="form-control" name="id" value="<?php echo e($subject->id); ?>" hidden="">
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
              </span><!-- END Edit subject -->
              </div>


            <div class="col-sm-6">
              <span><!-- START Delete subject -->
              <p class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#MD<?php echo e($subject->id); ?>" ><b>SUPPRIMER</b></button></p>
                <!-- Modal Delete subject -->
                <div class="modal fade" id="MD<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(URL::to('/kuro/admin/deleteSubject')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Suppression d'une matière d'étude</h5>                        
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <div class="modal-body">
                        <div class="text-center">
                        <p>SUPPRIMER CETTE MATIERE?</p>
                        <h4 class="card-title text-center">
                        <?php echo e($subject->name); ?> 
                        </h4>
            
                        <input type="hidden" class="form-control" name="id" value="<?php echo e($subject->id); ?>" hidden="">
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
              </span><!-- END Edit subject -->
            </div>

          </div>


              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- END ROW -->
        <!-- EMPTY HANDLER -->
        <?php if($subjects->count() <= 0 ): ?> 
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucune matière créée </button>
        </p>
        <?php endif; ?>
        <!-- END EMPTY HANDLER -->
        

        <!-- Pagination 
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
          </li>
        </ul> -->
                  <!-- /.row -->

      </div> <!-- END container-fluid -->


      </div>
    </div>
  </div>

<!-- CARD CAROUSEL JS 
<script type="text/javascript">

(function ($) {
  "use strict";
  // Auto-scroll
  $('#myCarousel').carousel({
    interval: 200
  });

  // Control buttons
  $('.next').click(function () {
    $('.carousel').carousel('next');
    return false;
  });
  $('.prev').click(function () {
    $('.carousel').carousel('prev');
    return false;
  });

  // On carousel scroll
  $("#myCarousel").on("slide.bs.carousel", function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;
    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide -
          (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end 
        if (e.direction == "left") {
          $(
            ".carousel-item").eq(i).appendTo(".carousel-inner");
        } else {
          $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
      }
    }
  });
})
(jQuery);

</script>  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/editSubject.blade.php ENDPATH**/ ?>