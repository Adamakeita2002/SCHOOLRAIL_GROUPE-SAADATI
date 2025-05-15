


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
  <?php $student="activvve" ;?>

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
            <li class="breadcrumb-item active" aria-current="page">Affecter un étudiant</li>
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
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status2')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

<?php if($Nstudents->count() <=0): ?>


<div class="d-flex justify-content-center">

  <div class="col-sm-6">
    <div class="card">
      <h4 class="card-header bg-danger text-white"><i class="fa fa-info-circle" aria-hidden="true"></i>
AFFECTATION
</h4>

      <div class="card-body ">
        <h4>Si vous apercevez cette notification, cela signifie que tous vos étudiants sont affectés à une classe.</h4> <h6>Vous devez créer des étudiants afin de pouvoir les affecter dans leur classe respective.</h6>
      </div>
    </div>
  </div>


</div>

<!--
          <div class="col-sm-4">

             Side Widget 
            <div class="card">
              <h4 class="card-header bg-secondary text-white">Matière Dispensée</h4>

              <div class="card-body ">
               <h4>C++</h4> 
               <h4>Developpement Web</h4> 
               <h4>PHP</h4> 
               <h4>Web Design</h4> 
              </div>

            </div>
            
          </div> -->

<?php endif; ?>

<?php if($Nstudents->count() >0): ?>
 <!-- Page Heading -->
  <h4 class="my-4 text-center">LISTE DES ETUDIANTS NON AFFECTES</h4>

        <div class="row">
          <div class="card-body">

        <form action="<?php echo e(URL::to('/kuro/admin/affectationStudent')); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
            <table class="table ">
            <thead class="thead-dark">
              <tr>
                
                <th scope="col">NOM ET PRENOM(s)</th>
                <th scope="col">DATE DE NAISSANCE</th>
                <th scope="col">TELEPHONE</th>
                <th scope="col">CLASSE D'AFFECTATION</th>
              </tr>
            </thead>

            <tbody>
              
             <?php $i=0;  ?>
              <?php $__currentLoopData = $Nstudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++; ?>
              <tr> 
                <td><b><?php echo e($student->name); ?></b> <?php echo e($student->surname); ?> <span style= "color:<?php if($student->gender=='F'): ?>#c22e6d <?php else: ?>  blue <?php endif; ?>">(<?php echo e($student->gender); ?>)</span> </td>
                <?php  $years = Carbon::parse($student->dateofbirth)->age;?> 
                <td><?php echo e($student->dateofbirth); ?> - <b>(<?php echo e($years); ?> ans)</b></td>

                <td><?php echo e($student->tel); ?></td>
               
                <td>
                <div class="form-group">
                  <label><b>Affecter l'étudiant dans une classe</b></label>
                  <select class="form-control" name="classroom<?php echo e($i); ?>" required>
                    <option value="">Choisir la classe</option>
                    <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($classroom->id); ?>"><?php echo e($classroom->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <input type="hidden" value="<?php echo e($student->id); ?>" name="student<?php echo e($i); ?>">
                </td>

              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>

          </table>    
          <p class="text-center">

            <button class="btn btn-success" type="submit"><b>VALIDER LES AFFECTATIONS</b></button>
          </p>     
      </form>
          </div>
        </div><!-- END ROW -->

<hr>
<?php endif; ?>


        <!-- EMPTY HANDLER -->
        <?php if($students->count() <= 0 ): ?> 
        <p class="text-center">
          <button class="btn btn-danger"> Vous n'avez aucun étudiant </button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/affectStudent.blade.php ENDPATH**/ ?>