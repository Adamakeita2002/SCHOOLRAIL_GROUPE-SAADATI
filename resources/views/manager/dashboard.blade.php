@extends ('layouts.master')


@section ('content')
<?php use Carbon\Carbon;?>
<?php $account="active" ;?>
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
                        <div style="padding-top: 20px; text-align: center;">
                        <img src="/img/small/xetudiant.png" width="80" alt="...">

                        </div>
                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"> ELEVES</h4>
                      <!--  <p class="card-text">Some example text.</p>-->
                      <p class="text-center"><a href="/manager/findStudent" class="btn btn-primary"> Voir </a></p>
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
                      <p class="text-center"><a href="/manager/findTeacher" class="btn btn-primary"> Voir </a></p>
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
                      <p class="text-center"><a href="/manager/schoolNews" class="btn btn-primary"> Voir </a></p>
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
                      <p class="text-center"><a href="/manager/quest" class="btn btn-primary"> Voir </a></p>
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
                      <p class="text-center"><a href="/manager/findMark" class="btn btn-primary"> Voir </a></p>
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
                      <p class="text-center"><a href="/manager/message/student" class="btn btn-primary"> Voir </a></p>
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

          <hr>

          <h4 class="text-center">VOS ROLES EN TANT QUE MANAGER</h4>

        <div class="row">

            <div class="col-sm-4">
                <div class="card text-white bg-primary mb-3" >
                <div class="card-header"><b>Gérer votre profile</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
              </div>
            </div>

@if($manager->student==1)
          <div class="col-sm-4">
            <div class="card text-white bg-success mb-3" >
              <div class="card-header"><b>Gérer les étudiants</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->teacher==1)
          <div class="col-sm-4">
            <div class="card text-white bg-danger  mb-3" >
              <div class="card-header"><b>Gérer les professeurs</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->program==1)
            <div class="col-sm-4">
                <div class="card text-white mb-3" style="background-color:#6610f2" >
                <div class="card-header"><b>Gérer les filières</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
              </div>
            </div>
@endif

@if($manager->classroom==1)
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#6f42c1" >
              <div class="card-header"><b>Gérer les classes</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->subject==1)
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#e83e8c" >
              <div class="card-header"><b>Gérer les matières</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->school==1)
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#e95644"  >
              <div class="card-header"><b>Gérer les outils scolaires</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>

@endif


@if($manager->ressource==1)
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#e98925" >
              <div class="card-header"><b>Gérer les ressources</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->message==1)
          <div class="col-sm-4">
            <div class="card text-white  mb-3" style="background-color:#343a40" >
              <div class="card-header"><b>Envoyer des messages</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif

@if($manager->comptabilite==1)
          <div class="col-sm-4">
            <div class="card text-white mb-3" style="background-color:#343a40" >
              <div class="card-header"><b>Gérer la comptabilité</b></div>
          <!--  <div class="card-body">
                  <p class="card-text">Vous pouvez modifier un champ accessible</p>
                </div>
          -->
            </div>
          </div>
@endif
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
