


<?php $__env->startSection('content'); ?>

  <?php $profile="activve" ;?>
    <div class="app">
      <div class="app-body">
      <!--SIDEBAR -->
      <?php echo $__env->make('layouts.sidebarS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"> <a href="/student">Accueil</a> </li>
            <li class="breadcrumb-item " aria-current="page"> <a href="/student/profile">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier</li>
          </ol>
        </nav>

        <div class="container-fluid">
             <?php if($student->gender == 'M'): ?>
              <img src="/img/large/xmetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              <?php else: ?>
              <img src="/img/large/xfetudiant.jpg" style="width:250px; padding-top: 20px" class="img-thumbnail card-img-top mx-auto d-block" alt="Photo Profile" >
              <?php endif; ?>

              <?php if(session('status1')): ?>
                  <div align="center">
                      <div class="alert alert-success text-center">
                       <b><i class="icon-info"></i> <?php echo e(session('status1')); ?><br></b>
                      </div>
                  </div>
              <?php endif; ?>

          <h2 class="text-center text-secondary">N* Matricule: <?php echo e($student->matricule); ?></h2>

      <form  action="/student/editStudent" method="post" enctype="multipart/form-data" id="theform">
      <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Nom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo e($student->name); ?>" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Prénom <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo e($student->surname); ?>" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Filière / Classe <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo e($student->classroom->program->fullname); ?> (<?php echo e($student->classroom->name); ?>)" disabled>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Date de naissance <small class="text-success">(accessible)</small>
                </label>
                <?php
                $date=date_create($student->dateofbirth);
                ?>
                <input type="text" class="form-control" name="dateofbirth" placeholder="<?php if(empty($student->dateofbirth)): ?> JJ-MM-AA Ex: (20-12-1995) <?php else: ?> <?php echo e(date_format($date,'d-m-Y')); ?> <?php endif; ?>"
                pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}">
                <!--
                <input type="text"  class="form-control"

                title="Entrer une date correspondant a ce format: JOUR-MOIS-ANNEE Ex: (20-12-1995)" />
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>-->
              </div>
            </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Déterminer votre genre <small class="text-success">(accessible)</small></label>
              <select class="form-control" name="gender">
                <option value="<?php echo e($student->gender); ?>" >
                 <?php if($student->gender=='M'): ?> Masculin <?php else: ?> Feminin <?php endif; ?>
               </option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
              </select>
              <!--<small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>-->
            </div>
          </div>
<!--
            <div class="col-md-4">
              <div class="form-group">
                <label>
                  Genre <small class="text-danger">(inaccessible)</small>
                </label>
                <input class="form-control" type="text"  placeholder="<?php if($student->gender=='M'): ?> Masculin <?php elseif($student->genre=='F'): ?> Feminin <?php endif; ?>" disabled>
              </div>
            </div>
-->
            <div class="col-md-4">
              <div class="form-group ">
                <label>Email <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="email" placeholder="<?php echo e($student->email); ?>">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Adresse (votre quartier) <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="address" placeholder="<?php echo e($student->address); ?>">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group ">
                <label>Téléphone <small class="text-success">(accessible)</small></label>
                <input type="text" class="form-control" name="tel" placeholder="<?php echo e($student->tel); ?>">
                <small class="text-secondary">Veuillez ne pas laissez pas ce champ vide</small>
              </div>
            </div>

        </div>


              <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">
                  Valider vos informations
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

      <br>

        <div class="row">

          <div class="col-sm-6">
              <div class="card text-white bg-success mb-3" >
              <div class="card-header"><b>Champ accessible</b></div>
              <div class="card-body">
                <p class="card-text">Vous pouvez modifier un champ accessible</p>
              </div>
            </div>
          </div>

        <div class="col-sm-6">
          <div class="card text-white bg-danger mb-3" >
            <div class="card-header"><b>Champ inaccessible</b></div>
            <div class="card-body">
              <p class="card-text">Seul <b>l'administration</b> peut modifier un champ inaccessible</p>
            </div>
          </div>
        </div>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_GROUPE SAADATI\resources\views/student/EditProfile.blade.php ENDPATH**/ ?>