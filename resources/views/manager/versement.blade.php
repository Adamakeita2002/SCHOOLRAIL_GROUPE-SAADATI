@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
<?php $comptabilite="activve" ;?>
    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarM')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarM')
      <!--END NAVBAR -->

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Accueil</li>
          </ol>
        </nav>

        <div class="container-fluid">

                 <div class="row"> <!-- row -->

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div class="text-primary" style="padding-top: 20px; text-align: center;">
                        <i class="fa fa-id-card" aria-hidden="true" style="font-size: 100px";  ></i>

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> SCOLARITE</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/manager/versement/scolarite" class="btn btn-primary"><b> Voir </b></a></p>    
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div class="text-warning" style="padding-top: 20px; text-align: center;">
                        <i class="fa fa-cutlery" aria-hidden="true" style="font-size: 100px;"></i>
                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> CANTINE</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/manager/versement/cantine" class=" text-white btn btn-warning"> 
                        <b> Voir </b> </a></p>    
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div class="text-success" style="padding-top: 20px; text-align: center;">
                        <i class="fa fa-bus" aria-hidden="true" style="font-size: 100px;"></i>

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> BUS</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/manager/versement/bus" class="btn btn-success"> <b> Voir </b> </a></p>    
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center; color:#eeafe1;">
                        <i class="fa fa-male" aria-hidden="true" style="font-size: 100px";  ></i>
                        <i class="fa fa-female" aria-hidden="true" style="font-size: 100px";  ></i>
                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> TENUE SCOLAIRE</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center">
                        <a href="/manager/versement/findExtra?x=4" class="btn btn-frose"><b> Classe </b></a>
                        <a href="/manager/versement/findExtra?x=5" class="btn btn-frose"><b> Sport </b></a>
                      </p>    
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center; color:#ee9638;">
                        <i class="fa fa-futbol-o" aria-hidden="true" style="font-size: 100px;"></i>
                        <i class="fa fa-gamepad" aria-hidden="true" style="font-size: 100px;"></i>
                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> ACTIVITE PERISCOLAIRE </h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center">
                        <a href="/manager/versement/findExtra?x=6" class=" text-white btn btn-forange"> 
                        <b> Basket </b> </a>
                        <a href="/manager/versement/findExtra?x=7" class=" text-white btn btn-forange"> 
                        <b> Natation </b> </a>
                        <a href="/manager/versement/findExtra?x=8" class=" text-white btn btn-forange"> 
                        <b> Taekwondo </b> </a>
                      </p>    
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center; color:#e6e0af;">
                        <i class="fa fa-book" aria-hidden="true" style="font-size: 100px;"></i>

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> FOURNITURE</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/manager/versement/findExtra?x=9" class="btn btn-fmarron"> <b> Voir </b> </a></p>    
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

@endsection
