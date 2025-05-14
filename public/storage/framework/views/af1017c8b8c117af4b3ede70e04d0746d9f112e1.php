


<?php $__env->startSection('content'); ?>
<?php use Carbon\Carbon;?>
<?php $profile="activve" ;?>
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
                    <img class="card-img-top mx-auto d-block" src="/assets/img/img_avatar1.png" alt="Votre Image" style="width:100%; padding-top: 20px">
                </div>

                <div class="col-sm-6 mt-3">

                    <div class="card-body">
                      <h4 class="card-title"> <b>Nom: </b>
                        <br><?php echo e($manager->surname); ?>

                      </h4>

                      <h4 class="card-title"> <b>Prénom: </b>
                        <br><?php echo e($manager->name); ?>

                      </h4>

                      <br>

                      <h4 class="card-title"><b>Email: </b>
                        <br><?php echo e($manager->email); ?>

                      </h4>

                      <h4><b>Telephone:</b>
                        <br><?php echo e($manager->tel); ?>

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
                <h6><b>Nombre d'etudiants </b><br><span style="font-size: 14px"><?php echo e($academicyearP->students()->count()); ?></span></h6>
                <h6><b>Nombre de professeurs </b><br><span style="font-size: 14px"><?php echo e($teachers->count()); ?></span></h6>
                <h6><b>Nombre de parents </b><br><span style="font-size: 14px"><?php echo e($tutors->count()); ?></span></h6>
                <h6><b>Nombre de programmes </b><br><span style="font-size: 14px"><?php echo e($programs->count()); ?></span></h6>
                <h6><b>Nombre de classes </b><br><span style="font-size: 14px"><?php echo e($classrooms->where('academicyear_id',$academicyearP->id)->count()); ?></span></h6>
                <h6><b>Nombre de ressources </b><br><span style="font-size: 14px"><?php echo e($ressources->count()); ?></span></h6>



                </div>

              </div>

            </div>

          </div>

          <hr>

          <h4 class="text-center">VOS ROLES EN TANT QUE MANAGER</h4>

        <div class="row">


<?php if($manager->student==1): ?>
          <div class="col-sm-4">
            <div class="card text-white bg-success mb-3" >
              <div class="card-header"><b>Gérer les étudiants</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->teacher==1): ?>
          <div class="col-sm-4">
            <div class="card text-white bg-danger  mb-3" >
              <div class="card-header"><b>Gérer les professeurs</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->program==1): ?>
            <div class="col-sm-4">
                <div class="card text-white mb-3" style="background-color:#6610f2" >
                <div class="card-header"><b>Gérer les filières</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
              </div>
            </div>
<?php endif; ?>

<?php if($manager->classroom==1): ?>
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#6f42c1" >
              <div class="card-header"><b>Gérer les classes</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->subject==1): ?>
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#e83e8c" >
              <div class="card-header"><b>Gérer les matières</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->school==1): ?>
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#e95644"  >
              <div class="card-header"><b>Gérer les outils scolaires</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>

<?php endif; ?>


<?php if($manager->ressource==1): ?>
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#e98925" >
              <div class="card-header"><b>Gérer les ressources</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->message==1): ?>
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#343a40" >
              <div class="card-header"><b>Envoyer des messages</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

<?php if($manager->comptabilite==1): ?>
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#343a40" >
              <div class="card-header"><b>Gérer la comptabilité</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
<?php endif; ?>

        </div>


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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/manager/profile.blade.php ENDPATH**/ ?>