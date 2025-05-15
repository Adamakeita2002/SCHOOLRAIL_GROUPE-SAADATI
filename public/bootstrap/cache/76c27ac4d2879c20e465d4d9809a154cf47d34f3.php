


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
<?php $profile="activvve" ;?>
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
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">

        <div class="row">

          <div class="col-sm-6">
            <h4 class="card-header bg-secondary text-white">Informations personnelles</h4>
            <div class="card">

             <div class="row">

                <div class="col-sm-6">
                    <img class="card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Card image" style="width:100%; padding-top: 20px">
                </div>

                <div class="col-sm-6 mt-3">

                    <div class="card-body">
                      <h4 class="card-title"> <b>Nom: </b>
                        <br><?php echo e($admin->surname); ?>

                      </h4>

                      <h4 class="card-title"> <b>Prénom: </b>
                        <br><?php echo e($admin->name); ?>

                      </h4>

                      <br>

                      <h4 class="card-title"><b>Email: </b>
                        <br><?php echo e($admin->email); ?>

                      </h4>

                      <h4><b>Telephone:</b>
                        <br><?php echo e($admin->tel); ?>

                      </h4>

                    </div>

                </div>

              </div>

            </div>


            </div>

            <div class="col-sm-6">

              <!-- Side Widget -->
              <div class="card">
                <h4 class="card-header bg-secondary text-white">Informations générales</h4>

                <div class="card-body ">
                  <?php if($academicyearP): ?>
                <h6><b>Nombre d'etudiants </b><br><span style="font-size: 14px"><?php echo e($academicyearP->students()->count()); ?></span></h6>
                <h6><b>Nombre de professeurs </b><br><span style="font-size: 14px"><?php echo e($teachers->count()); ?></span></h6>
                <h6><b>Nombre de parents </b><br><span style="font-size: 14px"><?php echo e($tutors->count()); ?></span></h6>
                <h6><b>Nombre de programmes </b><br><span style="font-size: 14px"><?php echo e($programs->count()); ?></span></h6>
                <h6><b>Nombre de classes </b><br><span style="font-size: 14px"><?php echo e($classrooms->where('academicyear_id',$academicyearP->id)->count()); ?></span></h6>
                <h6><b>Nombre de ressources </b><br><span style="font-size: 14px"><?php echo e($ressources->count()); ?></span></h6>
                  <?php endif; ?>


                </div>

              </div>

            </div>

          </div>

          <hr>

        </div>


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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/admin/profile.blade.php ENDPATH**/ ?>