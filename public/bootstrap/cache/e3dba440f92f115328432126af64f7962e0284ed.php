


<?php $__env->startSection('content'); ?>

  <?php $school="activve" ;?>
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
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item active " aria-current="page">Actualités</li>
          </ol>
        </nav>

      <div class="container-fluid"> <!-- container-fluid-->

  <div class="row justify-content-md-center">

      <!-- Blog Entries Column offset-md-1 -->
      <div class="col-md-7 ">

        <h1 class="my-4 card-header text-center bg-primary text-white">ACTUALITES</h1>

        <!-- Blog Post -->

        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4" id="N<?php echo e($new->id); ?>">

          <div class="card-body">
            <h2 class="card-title"><?php echo e($new->title); ?></h2>
            <p class="card-text"><?php echo e($new->description); ?></p>
          </div>
          <?php if(!empty($new->upload)): ?>
          <img class="card-img-top" src="/files/schoolNews/<?php echo e($new->upload); ?>" alt="IMAGE">
          <?php endif; ?>
          <div class="card-footer text-muted">
            <p>- Posté il y a <b><?php echo e($new->created_at->diffForHumans()); ?></b></p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- EMPTY HANDLER -->
        <?php if($news->count() <= 0 ): ?>
        <p class="text-center">
          <button class="btn btn-danger"> AUCUNE ACTUALITE DISPONIBLE </button>
        </p>
        <?php endif; ?>
        <!-- END EMPTY HANDLER -->



        <!-- Pagination
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Mot de la directrice</h5>
        <img class="rounded-circle mt-4 mx-auto d-block" alt="directeur" width="200" height="200" src="/assets/img/logo-petite-academy.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title text-center">Bonjour</h4>
          <p class="card-text">Vu les conditions sanitaires déplorables <b>(Covid-19) </b>, nous avons conçu cette plateforme dans l'objectif d'accomplir notre mission, qui est de vous assurer une éducation garantie.</p>
          <p class="card-text">Nous espérons que cela a été plus que utile.</p>
          <p class="card-text"><i>Cordialement!</i></p>
        </div>

    </div>

        <!-- Contact Important -->
        <!--
        <div class="card my-4">
          <h5 class="card-header">Contacts Importants</h5>
          <div class="card-body">
            <h2 class="text-center"><b>HETEC - Email: </b><br><span style="font-size: 20px">info@hetec-mali.com</span> </h2>
            <div class="row">
              <div class="col-sm-6">
                <h6><b>Chargé de l'information: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

                <h6><b>Sécretaire générale</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
              <div class="col-sm-6">
              <h6><b>Chargé de la formation: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

              <h6><b>Chargé de l'organisation</b> <br><span style="font-size: 14px">77557950</span> </h6>
              </div>
            </div>
          </div>
        </div>
      -->

      </div>

    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO T14\Desktop\SCHOOLRAIL_HETEC_V2\resources\views/student/schoolNews.blade.php ENDPATH**/ ?>