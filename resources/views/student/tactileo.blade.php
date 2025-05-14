@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
  <?php $materiel="activve" ;?>
    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarS')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbar')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
            <li class="breadcrumb-item " aria-current="page">E-learning</li>
            <li class="breadcrumb-item active" aria-current="page">Tactileo</li>
          </ol>
        </nav>

        <div class="container-fluid">


<iframe src="https://tactileo.africa/sso/logon/imaginecole" width="100%" height="600"></iframe>


        <div class="callout callout-info">

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-3 mt-4">
             <!--   <img src="/assets/img/logo-hetec.jpg" class="" width="263px" height="100px"> -->
              </div>
              <div class="col-sm-3" style="margin-top: 35px">
               <h3 class="mt-4">EN PARTENARIAT AVEC :</h3>
              </div>
              <div class="col-sm-3 mt-4">
               <img src="/assets/img/protech.jpeg" class="" width="263px" height="100px">
              </div>
              <div class="col-sm-2 mt-1">
               <img src="/assets/img/logo-schoolrail.png" class="" width="150px" height="150px">
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

@endsection
