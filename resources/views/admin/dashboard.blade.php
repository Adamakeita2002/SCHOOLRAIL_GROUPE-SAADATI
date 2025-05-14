@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
<?php $account="active" ;?>
    <div class="app">
      <div class="app-body">

      <!--SIDEBAR -->
      @include('layouts.sidebarA')
      <!--END SIDEBAR -->

      <div class="app-content">

      <!--NAVBAR -->
      @include('layouts.navbarA')
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
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xetudiant.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> ETUDIANTS</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/findStudent" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xprofesseur.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> PROFESSEURS</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/findTeacher" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xinfo.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> INFOS SCHOOL</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/schoolNews" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center;">
                        <i class="icon-envelope-letter" style="font-size: 80px"></i>

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> REQUETES</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/quest" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xnote.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> NOTES</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/findMark" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                     <div class="card" >
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xcommunication.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> MESSAGE</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/kuro/admin/message/student" class="btn btn-primary"> Voir </a></p>
                      </div>
                     </div>
                    </div>
                <!--
                    <div class="col-sm-4">
                     <div class="card" >
                      <img class="card-img-top" src="./assets/img/john-doe.png" alt="Card image">
                      <div class="card-body">
                        <h4 class="card-title">Schedule</h4>
                        <p class="card-text">Some example text.</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                      </div>
                     </div>
                    </div>
                -->
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
